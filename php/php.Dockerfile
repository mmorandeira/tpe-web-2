FROM php:8.1.0-fpm

RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug
    