FROM php:8.1-apache as apache

COPY . /var/www/html
ENV NODE_VERSION=16.17.0
ARG DOCKER_USER_ID
ARG DOCKER_GROUP_ID
ARG DOCKER_USER
RUN echo "DOCKER_USER_ID=${DOCKER_USER_ID}"
RUN echo "DOCKER_GROUP_ID=${DOCKER_GROUP_ID}"
RUN echo "DOCKER_USER=${DOCKER_USER}"

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
RUN apt-get update && apt-get install -y libzip-dev && docker-php-ext-install zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $DOCKER_USER_ID -d /home/$DOCKER_USER $DOCKER_USER
RUN mkdir -p /home/$DOCKER_USER/.composer && \
    chown -R $DOCKER_USER:$DOCKER_USER /home/$DOCKER_USER
RUN usermod -aG sudo $DOCKER_USER
RUN usermod -aG root $DOCKER_USER

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY docker/php/xdebug.ini "${PHP_INI_DIR}/conf.d"

# Install NodeJS and npm
RUN apt install -y curl
RUN curl https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.gz | tar -xz -C /usr/local --strip-components 1
RUN node --version
RUN npm --version

# Install and configure Apache
RUN chown -R $DOCKER_USER:www-data /var/www/html
RUN a2enmod rewrite && service apache2 restart

COPY docker/apache/apache_config.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/php/php.ini /usr/local/etc/php/php.ini

# Install and configure Supervisor
RUN echo "Installing Supervisor...."
RUN whoami
RUN apt-get update && apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
RUN chmod -R 777 /var/log/supervisor
COPY docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/supervisor/startup.sh /etc/startup.sh
RUN chmod +x /etc/startup.sh

# Set working directory
WORKDIR /var/www/html

USER $DOCKER_USER

$DOCKER_USER

RUN chown $DOCKER_USER -R storage/logs
# Run Laravel dependencies
RUN composer install
RUN composer dump-autoload
RUN php artisan config:clear
RUN php artisan config:cache
RUN npm install
RUN npm run prod

USER root

RUN chmod 777 -R storage/logs
RUN chmod 777 -R storage/framework
RUN chmod 777 -R public/assets/netapp/logo


CMD ["/bin/bash","-c","/etc/startup.sh"]
