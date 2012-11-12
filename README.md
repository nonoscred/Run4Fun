Run4Fun
=======


Installation
============

Clone the repository

    git clone https://github.com/IDCI-Consulting/Run4Fun.git

Then install the dependencies with composer:

    php composer.phar update

For a local installation with apache:

Create a vhost:

    <VirtualHost *:80>
        ServerName local.run4fun
        DocumentRoot .../Run4Fun/web

        <Directory .../Run4Fun/web>
                Options Indexes FollowSymLinks
                AllowOverride All
        </Directory>

        LogLevel warn
        ErrorLog .../log/apache2/run4fun.log
        CustomLog .../log/apache2/run4fun_access.log combined
    </VirtualHost>

Modifiy you local hosts file

    127.0.0.1   local.run4fun

Configure your database like this for symfony:

    database_name:     sf2_run4fun
    database_user:     sf2_run4fun
    database_password: sf2_run4fun

And as follow for the wordpress:

    database_name:     wp_run4fun
    database_user:     wp_run4fun
    database_password: wp_run4fun

or modify the app/config/parameters.yml file and the web/wordpress/wp-config.php

Then you can generate the needed tables for symfony with this command:

    php app/console doctrine:schema:update --force

And load the wordpress table with the dump locate in src/R4F/dump/wp_run4fun.sql.gz

Don't forget to fix cache and log permissions. For ubuntu users:

    sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs
    sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs


Go on http://local.run4fun

To go in the symfony admin: http://local.run4fun/admin (No login and password for the moment) 
To go in the wordpress backend: http://local.run4fun/wordpress/wp-admin/index.php (admin/admin) 
