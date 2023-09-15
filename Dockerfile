FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

WORKDIR /var/www/html

COPY ./src /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]