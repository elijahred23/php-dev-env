# Use an official PHP image as the base image
FROM php:7.4-apache

# Install any necessary PHP extensions, including mysqli
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Set the working directory
WORKDIR /var/www/html

# Copy your PHP application files into the container
COPY ./src /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
