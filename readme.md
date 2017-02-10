# Gallery [![Build Status](https://travis-ci.org/ekiwok/Gallery.svg?branch=master)](https://travis-ci.org/ekiwok/Gallery)

### Setup

```bash
composer install
cp .env.example .env

# If necessary add user/host/etc. parameters
mysql -e 'CREATE DATABASE myapp_test;' 

php artisan doctrine:schema:create
php artisan doctrine:generate:proxies
php artisan app:load:fixtures 

php artisan serve
```
