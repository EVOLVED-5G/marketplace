# Εvolved-5G Marketplace | Web Application

Laravel 8 Web Application for Evolved-5G Market


[Project URL](https://evolved5g-marketplace.maggioli.gr)


# Installation Instructions:

## First time install (setup database and install dependencies)

1. Make sure `php 7.4` (or newer) and `NodeJS v14` (or newer) are installed.
2. Make sure php [related packages](https://stackoverflow.com/questions/40815984/how-to-install-all-required-php-extensions-for-laravel) are installed
4. Install laravel/back-end dependencies
```
composer install
composer dump-autoload
```
4. After cloning the project, create an .env file (should be a copy of .env.example),
   containing the information about your database name and credentials.
   Then run ```php artisan migrate``` to create the DB schema and
   ```php artisan db:seed``` in order to insert the starter data to the DB

5. Install front-end dependencies
```
npm install
```

Node version that should be used: `14.18.1`
Npm version  that should be used:  `6.14.5`


6. Create symbolic link for uploaded files.

```
php artisan storage:link
```
to link the `/public/storage` folder with the `/storage/app/public` director


7. Create folder /public/assets  and allow the www-data user to create new folders there

## Apache configuration example:


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
Make the symbolic link:
```
% cd /etc/apache2/sites-enabled && sudo ln -s ../sites-available/evolved5g-marketplace.conf
```
Enable mod_rewrite, mod_ssl and restart apache:
```
% sudo a2enmod rewrite && sudo a2enmod ssl && sudo service apache2 restart
```
Fix permissions for storage directory:
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
Change hosts file so local-dev.evolved5g-marketplace points to localhost
```$xslt
sudo nano /etc/hosts
127.0.0.1       local-dev.evolved5g-marketplace

```

## How to debug
- Install and configure Xdebug on your machine
- At Chrome install [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc?utm_source=chrome-app-launcher-info-dialog)
- At PhpStorm/IntelliJ click the "Start listening for PHP debug connections"

## About the Blockchain Integration

The Evolved-5G Marketplace makes use of the Ethereum Blockchain, in order to create digital signatures when a Netapp is bought.

In order to do so, every time a purchase is made, the app communicates with an external Nodejs REST API, that makes the request to the Ethereum Blockchain.

This script can be found in this GitHub repository: [ETH Transaction Sender](https://github.com/EVOLVED-5G/marketplace-blockchain-integration).

In order to install the script, clone the repository and then set up the NodeJS/Express app in order to run on the :8000 port of the host machine.
Then, edit the `CRYPTO_SENDER_BASE_URL` variable in the `.env` file, so that Laravel knows where to find the endpoint. An example can be found in the `.env.example` file.

**NOTE**

If the `CRYPTO_SENDER_BASE_URL` variable is left empty, then the app will regard the Blockchain integration as non-functional and will not make the API call.


## About the TM Forum Integration

The Evolved-5G Marketplace makes use of the TM Forum API, in order to create product offerings when a Netapp is created.

In order to do so, every time a netapp is created **and is set to have a fixed price**, the app communicates with an external TM Forum REST API, that stores the relevant information for the product offering.

The TM Forum implementation can be found in this GitHub repository: [TM Forum API](https://github.com/EVOLVED-5G/marketplace-tmf620-api).

In order to install the TM Forum Backend, clone the repository and then use the provider Docker files in order to make it available on the :8080 port of the host machine.
Then, edit the `TM_FORUM_API_BASE_URL` variable in the `.env` file, so that Laravel knows where to find the endpoint. An example can be found in the `.env.example` file.

**NOTE**

If the `TM_FORUM_API_BASE_URL` variable is left empty, then the app will regard the TM Forum API integration as non-functional and will not make the API call.

## Docker initialization

As mentioned above, the Evolved5G Project uses a total of 3 applications (code repositories) that act as services, communicating with each other.

This can (and is highly recommended to) be done via the existing Docker files that are available in each of the repositories, and that can be invoked using `docker-compose`.

In general, for each of the 3 repositories, it is needed to run `docker-compose up --build -d` in order to build the relevant images and containers, and make them available
in the docker runtime.

When using Docker though, communication between containers via `localhost` is not possible, though.
That is why in the `docker-compose.yml` file of the Laravel project (the project in which this Readme file is in), a step exists in which a Docker network is created.

Then, the other 2 repositories will use the same network and deploy their containers there.
So, when Laravel wants to communicate with the NodeJS Blockchain integration service, it will not call `http://localhost:8000`, but it will need to call
`http://evolved5g_blockchain_sender:8000`, since the name of the Blockchain Integration app container on the Docker network is `evolved5g_blockchain_sender`.

So, when running the 3 repositories via Docker, the `.env` file should be altered as such:

```bash
CRYPTO_SENDER_BASE_URL=http://evolved5g_blockchain_sender:8000/
TM_FORUM_API_BASE_URL=http://evolved5g_pilot_tmf_api_container:8080/tmf-api/
```
## Laravel initialization with Docker

After running `docker-compose up --build -d` in the root Laravel directory, the app will be available at [http://localhost:89](http://localhost:89).
In order to run all Laravel installation-specific commands (like `php artisan migrate` , `npm install`, etc) we can use the utility Docker containers that are defined in `docker-compose.yml`.

For example, we can run the migrations in the app that runs in the Docker container by running:

```bash
docker-compose run --rm artisan migrate
```

All the essential Laravel commands have also defined as shortcut in the `Makefile` that is in the root directory.
So if you want to run the migrations, simply run `make migrate`.
