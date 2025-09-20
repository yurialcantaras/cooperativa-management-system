# syntax=docker/dockerfile:1
FROM php:8.3-apache

WORKDIR /var/www/html/

# Install system libraries and intl extension
RUN apt-get update \
 && apt-get install -y --no-install-recommends libicu-dev \
 && apt-get install -y nano \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j$(nproc) intl mysqli \
 && rm -rf /var/lib/apt/lists/*

# Fix Apache docroot to /public
RUN a2enmod rewrite 
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#g' /etc/apache2/sites-available/000-default.conf
RUN sed -i '/DocumentRoot \/var\/www\/html/a \
<Directory "/var/www/html/public">\n\
    Options FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n\
DirectoryIndex index.php index.html' /etc/apache2/sites-available/000-default.conf

# RUN sed -i '/DocumentRoot \/var\/www\/html/a <Directory "/var/www/html/public"> Options FollowSymLinks AllowOverride All Require all granted </Directory> DirectoryIndex index.php index.html' /etc/apache2/sites-available/000-default.conf

