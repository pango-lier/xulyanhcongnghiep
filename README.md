
docker-compose -f docker-compose-local.yml build
docker-compose -f docker-compose-local.yml up
- Exec to App
composer install
php artisan key:generate
php artisan db:seed --class=UserSeeder

https://ckfinder.sanvu88.net/
