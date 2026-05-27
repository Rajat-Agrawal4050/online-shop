FROM php:8.2-apache

# PHP extensions install karo
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache mod_rewrite enable karo
RUN a2enmod rewrite

# Project files copy karo
COPY . /var/www/html/

# Permissions set karo
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80