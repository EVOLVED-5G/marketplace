FROM composer:latest as composer
COPY . /var/www/html
ARG DOCKER_GROUP_ID
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN addgroup -g $DOCKER_GROUP_ID laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel
RUN composer install
RUN composer dump-autoload

FROM node:14 as node
COPY --from=composer /var/www/html /var/www/html
WORKDIR /var/www/html
RUN npm install
RUN npm run prod

FROM php:8.1-apache as apache
COPY --from=node /var/www/html /var/www/html
WORKDIR /var/www/html
RUN docker-php-ext-install pdo pdo_mysql
RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite && service apache2 restart
COPY docker/apache_php/apache_config.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/apache_php/php.ini /usr/local/etc/php/php.ini
RUN apt-get update \
    && apt-get install -y --no-install-recommends supervisor
ADD docker/apache_php/supervisord.conf /etc/
ADD docker/apache_php/startup.sh /root/
RUN chmod +x /root/startup.sh
CMD ["/bin/bash","-c","/root/startup.sh"]
USER www-data
