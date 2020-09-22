FROM php:7.4.4-fpm

WORKDIR /var/www

COPY --from=composer:1.9 /usr/bin/composer /usr/bin/composer

RUN apt update && apt install -y zip unzip wget zlib1g-dev libicu-dev

RUN docker-php-ext-install pdo_mysql intl opcache

COPY . .

RUN composer install

RUN composer validate