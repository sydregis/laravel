#!/bin/bash

#php artisan migrate:fresh
#php artisan db:seed
#php artisan migrate

php artisan migrate:fresh

# Sans paramètres, c'est la classe DatabaseSeeder qui est utilisée.
php artisan db:seed
