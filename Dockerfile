# Use the official PHP 8.1 image with Apache
FROM php:8.3-apache

WORKDIR /var/www/html

# Enables the rewrite module for .htaccess
RUN a2enmod rewrite

#RUN chown -R www-data:www-data ../storage/

# Expose port 80
EXPOSE 80