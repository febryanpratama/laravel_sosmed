# Base Image dengan PHP-FPM Alpine
FROM php:7.4-fpm-alpine

# Install system dependencies
RUN apk --no-cache add \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    nano \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Set the working directory
WORKDIR /var/www

# Copy Laravel files to container
COPY . /var/www

# Set permissions for the Laravel folder
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Expose PHP-FPM port
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
