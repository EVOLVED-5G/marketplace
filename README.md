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

In order to do so, every time a purchase is made, the app communicates with an external Nodejs script that makes the request to the Ethereum Blockchain.

This script can be found in this GitHub repository: [ETH Transaction Sender](https://github.com/PavlosIsaris/eth-transaction-sender).

In order to install the script, clone the repository and then edit the `CRYPTO_TRANSACTION_SENDER_PATH` variable in the `.env` file, so that Laravel knows where to find the script. An example can be found in the `.env.example` file.

**NOTE #1:** the script assumes that `nodejs` is installed on the server and can be run by the same user that runs the Laravel app (group `www-data`).

**NOTE #2:** Make sure to also add the `node` executable path in `.env`, in the `NODEJS_PATH` variable.

