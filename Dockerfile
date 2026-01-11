# Use the official PHP 8.1 image with Apache
FROM php:8.3-apache

WORKDIR /var/www/html

USER root

ENV PHP_UID=1000
ENV PHP_GID=1000

# Enables the rewrite module for .htaccess
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

RUN groupadd -g $PHP_GID www
RUN useradd www -u $PHP_UID -g $PHP_GID -m -s /sbin/nologin

USER www