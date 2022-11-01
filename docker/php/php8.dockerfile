FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite && service apache2 restart


ENV NODE_VERSION=14.19.2
ENV NVM_DIR=/usr/local/.nvm
RUN mkdir "$NVM_DIR"
RUN apt install -y curl
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="$NVM_DIR/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN node --version
RUN npm --version

COPY ./docker/apache/apache_config.conf /etc/apache2/sites-enabled/000-default.conf

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY --chown=www-data:www-data ./ /var/www/html

USER www-data

WORKDIR /var/www/html
