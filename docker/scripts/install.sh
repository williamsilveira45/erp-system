#!/usr/bin/env bash

cd /var/www/app || exit

/usr/bin/composer install
/bin/cp .env.example .env
/usr/local/bin/php artisan key:generate

/usr/local/bin/php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
/usr/local/bin/php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
/usr/local/bin/php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
/usr/local/bin/php artisan vendor:publish --tag=typescript-transformer-config
/usr/local/bin/php artisan vendor:publish --tag=sanctum-migrations
/usr/local/bin/php artisan optimize:clear
/usr/local/bin/php artisan migrate --seed
