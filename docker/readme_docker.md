## Run docker

- cd /docker
- docker-compose build
- docker-compose up

## Run script in image docker

- docker-compose exec app composer install
- docker-compose exec app php artisan migrate
- docker-compose exec app php artisan db:seed
....
