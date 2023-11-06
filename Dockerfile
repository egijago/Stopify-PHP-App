FROM php:7.4.9-apache

# Expose the necessary port
EXPOSE 8888


RUN rm -f /etc/apt/apt.conf.d/docker-clean \
    && apt-get update \
    && apt install libxml2-dev -y \ 
    && apt install libpq-dev -y


# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql soap

# Enable Apache modules
RUN a2enmod rewrite

# Restart Apache service
RUN service apache2 restart

# Start Apache on container start
CMD ["apache2-foreground"]
