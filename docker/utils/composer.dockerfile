FROM composer:latest

ARG DOCKER_USER_ID

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

RUN addgroup -g $DOCKER_USER_ID laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

USER laravel

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]
