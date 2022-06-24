FROM php:8.1-fpm-alpine

ARG DOCKER_GROUP_ID

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R www-data:www-data /var/www/html

RUN addgroup -g $DOCKER_GROUP_ID laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

USER laravel
