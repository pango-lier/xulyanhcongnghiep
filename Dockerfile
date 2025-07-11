# Set master image
FROM php:7.4-fpm-alpine3.13

ARG user
ARG uid

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Additional dependencies
RUN apk update && apk add --no-cache \
    git \
    npm \
    curl \
    build-base shadow supervisor \
    php7-pear \
    php7-common \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-mcrypt \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-gd \
    php7-dom \
    php7-session \
    php7-zlib \
    autoconf pcre-dev \
    freetype-dev libjpeg-turbo-dev libpng-dev \
    libzip-dev \
    curl-dev \
    icu-dev

# Install python/pip
ENV PYTHONUNBUFFERED=1
RUN apk add --update --no-cache python3 && ln -sf python3 /usr/bin/python
RUN python3 -m ensurepip
RUN pip3 install --no-cache --upgrade pip setuptools
# https://github.com/Automattic/node-canvas/issues/1511
# https://github.com/node-gfx/node-canvas-prebuilt/issues/77
RUN apk add --no-cache make gcc g++ pkgconfig pixman-dev cairo-dev pango-dev libjpeg-turbo-dev giflib-dev

# ZIP extension
RUN docker-php-ext-install zip

# Add and Enable PHP-PDO Extenstions for PHP connect Mysql
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

# This extension required for Laravel Horizon
RUN docker-php-ext-install pcntl

# GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j "$(nproc)" gd

# XDEBUG
RUN apk add php7-pecl-xdebug
RUN cp /usr/lib/php7/modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902

# BCMath
RUN docker-php-ext-install bcmath

# Intl
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# https://github.com/bobthecow/psysh/issues/717#issuecomment-1127511252
RUN apk add --update less

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Imagick
RUN set -ex && \
    apk add --no-cache --virtual .build-deps \
    libxml2-dev \
    shadow \
    autoconf \
    g++ \
    make \
    && apk del .build-deps

# Use the default production configuration ($PHP_INI_DIR variable already set by the default image)
RUN cp -f "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN sed -e 's/bcmath.scale = 0/bcmath.scale = 2/' -i "$PHP_INI_DIR/php.ini"
RUN sed -e 's/;request_terminate_timeout = 0/request_terminate_timeout = 600;/' -i /usr/local/etc/php-fpm.d/www.conf

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user || true

# Set working directory
WORKDIR /var/www/html

RUN echo "* * * * * php /var/www/html/artisan schedule:run >> /dev/null 2>&1" >>/etc/crontabs/www-data

COPY .docker/supervisord.conf /etc/supervisord.conf
COPY .docker/supervisor.d/php-fpm.conf /etc/supervisor.d/php-fpm.conf
COPY .docker/supervisor.d/cron.conf /etc/supervisor.d/cron.conf
COPY .docker/supervisor.d/worker.conf /etc/supervisor.d/worker.conf
# COPY .docker/supervisor.d/horizon.conf /etc/supervisor.d/horizon.conf

COPY --chown=$user:$user . .

# Start Supervisor
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
