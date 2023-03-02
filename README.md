# Εvolved-5G Marketplace | Web Application

Laravel 8 Web Application for Evolved-5G Marketplace

## About this documentation guide

This documentation contains all the relevant instructions and information, in order to set up the marketplace project.

It contains 2 different initialization options, the first assuming a non-docker environment (classic), and the second
assuming a docker-enabled environment.

[Project URL](https://evolved5g-marketplace.maggioli.gr)

## Pre-initialization steps

After cloning the project, create an .env file (should be a copy of .env.example),
containing the information about your database name and credentials:

```bash
cp .env.example .env
```

Take a look at the `.env` file that was created. 
You may need to update the `DB_*` variables, in order to set up the DB connection.
Also, make sure that the `APP_URL` is set to the correct domain and port that you will be using.
Finally don't forget to set a password for `DEFAULT_ADMIN_USER_PASSWORD_FOR_SEED` which will be the administration panel password of the Marketplace UI

<hr>

## Installation Option #1: Non-Docker environment

### First time install (setup database and install dependencies)

#### PHP and NodeJS versions

0. Make sure `php 7.4` (or newer) and `NodeJS v14` (or newer) are installed:

Node version that should be used: `14.18.1`
Npm version that should be used:  `6.14.5`

Make sure
   php [related packages](https://stackoverflow.com/questions/40815984/how-to-install-all-required-php-extensions-for-laravel)
   are installed
### Laravel initialization commands

After the `.env` file is completed, we should run all the Laravel-related initialization commands.

1. Install all the backend Composer dependencies:

```bash
composer install

composer dump-autoload
```

2. Run the command to set the application unique key:

```bash
php artisan key:generate
```

If executed successfully, it will be set in the `APP_KEY` variable in the `.env` file.


3. Then, we can set up the DB schema and populating the DB:

```bash
php artisan migrate

php artisan db:seed
```

4. Make the soft link from the `/public/storage` folder with the `/storage/app/public` director

```bash
php artisan storage:link
```

5. Install and compile all frontend npm dependencies:

```bash
npm install

npm run dev
```

6. Create folder /public/assets and allow the www-data user to create new folders there

### Apache configuration example:

```
% sudo touch /etc/apache2/sites-available/evolved5g-marketplace.conf
% sudo nano /etc/apache2/sites-available/evolved5g-marketplace.conf
<VirtualHost *:80>
       
        ServerName local-dev.evolved5g-marketplace
        ServerAlias local-dev.evolved5g-marketplace
        DocumentRoot "/home/path/to/project/public"
        <Directory "/home/path/to/project/public">
            Require all granted
            AllowOverride all
        </Directory>
       
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```

7. Make the symbolic link:

```
% cd /etc/apache2/sites-enabled && sudo ln -s ../sites-available/evolved5g-marketplace.conf
```

8. Enable mod_rewrite, mod_ssl and restart apache:

```
% sudo a2enmod rewrite && sudo a2enmod ssl && sudo service apache2 restart
```

9. Fix permissions for storage directory:

```
sudo chown -R user:www-data storage
chmod 775 storage
cd storage/
find . -type f -exec chmod 664 {} \;
find . -type d -exec chmod 775 {} \;
```

Or run the `set-file-permissions.sh` script.

```$xslt
sudo ./set-file-permissions.sh www-data currentUser .
```

10. Change hosts file so local-dev.evolved5g-marketplace points to localhost

```$xslt
sudo nano /etc/hosts
127.0.0.1       local-dev.evolved5g-marketplace

```

<hr>

## Installation Option #2: Docker environment

### Docker initialization - Pre-installation commands

As mentioned above, the Evolved5G Project uses a total of 3 applications (code repositories) that act as services,
communicating with each other.

This can (and is highly recommended to) be done via the existing Docker files that are available in each of the
repositories, and that can be invoked using `docker-compose`.

In general, for each of the 3 repositories, it is needed to run `docker-compose up --build -d` in order to build the
relevant images and containers, and make them available
in the docker runtime.

When using Docker though, communication between containers via `localhost` is not possible, though.
That is why in the `docker-compose.yml` file of the Laravel project (the project in which this Readme file is in), a
step exists in which a Docker network is created.

Then, the other 2 repositories will use the same network and deploy their containers there.
So, when Laravel wants to communicate with the NodeJS Blockchain integration service, it will not
call `http://localhost:8000`, but it will need to call
`http://evolved5g_blockchain_sender:8000`, since the name of the Blockchain Integration app container on the Docker
network is `evolved5g_blockchain_sender`.

So, when running the 3 repositories via Docker, the `.env` file should be altered as such:

```bash
CRYPTO_SENDER_BASE_URL=http://evolved5g_blockchain_sender:8000/
TM_FORUM_API_BASE_URL=http://evolved5g_pilot_tmf_api_container:8080/tmf-api/
```

Check out the `.env.example` file, in order to see the 2 different configurations.

### Regarding the User ID and the Group ID

When the docker-compose service runs to  create the docker containers, it needs to know the Linux user ID and the Linux group ID of the current user.
In most installations this will be equal to `1000`, but in order to confirm, run:

```bash
id `whoami`
```
This command will output the `uid` of the user, as well as the `gid` of the user and the `gid` of the groups the user belongs to.
So, update the `.env` file accordingly:

```bash
DOCKER_USER_ID=1000
DOCKER_GROUP_ID=1000
```

### About the DB connection with Docker

You need first to specify a MySQL user and password of your choice in the `.env` file, and when the DB container is created, it will use these credentials from the .env file.

So, if you haven't specified those in the `.env` file, please delete the db container, add the credentials in `.env`, and create the container again.

Please note that since the Docker compose service that refers to the DB is called `db`, the `DB_HOST` variable in `.env` should also have `db` as a value.
See an example of all the DB-related field of `.env` here:

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=evolved5g_db
DB_USERNAME=admin
DB_PASSWORD=secret
```

### About the different Docker setup options

This repository includes 2 different Docker setups.
The first one is described in the `docker-compose.yml` file, and the second in the `docker-compose-immutable.yml` file.

The difference between the 2 files is that in the first setup option we make use of multiple containers (also called "utility" containers),
while in the second option everything is packed in a single container (apart from the DB).

### Docker Option #1 - Multi-container setup - Laravel initialization

Run `docker-compose up --build -d` in order to build all the Docker containers.

In order to run all Laravel installation-specific commands (like `php artisan migrate` , `npm install`, etc) we can use
the utility Docker containers that are defined in `docker-compose.yml`.

#### Laravel initialization commands

Let's begin by installing all the backend Composer dependencies:

```bash
docker-compose run --rm composer install

docker-compose run --rm composer dump-autoload
```

After the `.env` file is completed, we should run all the Laravel-related initialization commands.

Run the command to set the application unique key:

```bash
docker-compose run --rm artisan key:generate
```

If executed successfully, it will be set in the `APP_KEY` variable in the `.env` file.

Then, we can set up the DB schema and populating the DB:

```bash
docker-compose run --rm artisan migrate

docker-compose run --rm artisan db:seed
```

Make the soft link from `app/storage/` to `public/storage`:

```bash
docker-compose run --rm artisan storage:link
```

Install and compile all frontend npm dependencies:

```bash
docker-compose run --rm npm install

docker-compose run --rm npm run dev #for development environment

docker-compose run --rm npm run prod #for production environment
```

All the essential Laravel commands have also defined as shortcut in the `Makefile` that is in the root directory.
So if you want to run the migrations, simply run `make migrate`.

### Docker Option #2 - Single-container setup - Laravel initialization

In this setup, we will first build the single -monolith- container, and then we will enter the container and run all the commands from inside the container.

In order to build the container, run:

```bash
docker compose -f docker-compose-immutable.yml up --build
```

Now enter the Laravel container, by running:

```bash
docker exec -it evolved5g_pilot_marketplace_laravel bash
```

**From now on, all the commands assume execution inside the container.**

#### Laravel initialization commands

Let's begin by installing all the backend Composer dependencies:

```bash
composer install

composer dump-autoload
```

After that, we should run all the Laravel-related initialization commands.

Run the command to set the application unique key:

```bash
php artisan key:generate
```

If executed successfully, it will be set in the `APP_KEY` variable in the `.env` file.

Then, we can set up the DB schema and populating the DB:

```bash
php artisan migrate

php artisan db:seed
```

Make the soft link from `app/storage/` to `public/storage`:

```bash
php artisan storage:link
```

Install and compile all frontend npm dependencies:

```bash
npm install

npm run dev #for development environment

npm run prod #for production environment
```


After all the abode commands have been executed successfully, the app will be available
at [http://localhost:89](http://localhost:89).

## How to debug

- Install and configure Xdebug on your machine
- At Chrome
  install [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc?utm_source=chrome-app-launcher-info-dialog)
- At PhpStorm/IntelliJ click the "Start listening for PHP debug connections"

## About the Blockchain Integration

The Evolved-5G Marketplace makes use of the Ethereum Blockchain, in order to create digital signatures when a Netapp is
bought.

In order to do so, every time a purchase is made, the app communicates with an external Nodejs REST API, that makes the
request to the Ethereum Blockchain.

This script can be found in this GitHub
repository: [ETH Transaction Sender](https://github.com/EVOLVED-5G/marketplace-blockchain-integration).

In order to install the script, clone the repository and then set up the NodeJS/Express app in order to run on the :8000
port of the host machine.
Then, edit the `CRYPTO_SENDER_BASE_URL` variable in the `.env` file, so that Laravel knows where to find the endpoint.
An example can be found in the `.env.example` file.

**NOTE**

If the `CRYPTO_SENDER_BASE_URL` variable is left empty, then the app will regard the Blockchain integration as
non-functional and will not make the API call.

## About the TM Forum Integration

The Evolved-5G Marketplace makes use of the TM Forum API, in order to create product offerings when a Netapp is created.

In order to do so, every time a netapp is created **and is set to have a fixed price**, the app communicates with an
external TM Forum REST API, that stores the relevant information for the product offering.

The TM Forum implementation can be found in this GitHub
repository: [TM Forum API](https://github.com/EVOLVED-5G/marketplace-tmf620-api).

In order to install the TM Forum Backend, clone the repository and then use the provider Docker files in order to make
it available on the :8080 port of the host machine.
Then, edit the `TM_FORUM_API_BASE_URL` variable in the `.env` file, so that Laravel knows where to find the endpoint. An
example can be found in the `.env.example` file.

**NOTE**

If the `TM_FORUM_API_BASE_URL` variable is left empty, then the app will regard the TM Forum API integration as
non-functional and will not make the API call.

