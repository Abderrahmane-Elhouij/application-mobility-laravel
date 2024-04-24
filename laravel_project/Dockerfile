# Use an official PHP image with Apache as a base
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy composer.lock and composer.json to install PHP dependencies
COPY composer.lock composer.json /var/www/html/
  
# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www/html/

# Install Laravel dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Copy artisan file for Laravel commands
COPY artisan /usr/local/bin/
RUN chmod +x /usr/local/bin/artisan



# FROM php:8.0-fpm

# WORKDIR /var/www/html

# Install dependencies
# RUN apt-get update && apt-get install -y \
#        libpng-dev \
#        libjpeg-dev \
#        libfreetype6-dev \
#        zip \
#        unzip \
#        && docker-php-ext-configure gd --with-freetype --with-jpeg \
#        && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set up composer cache
# RUN --mount=type=cache,target=/var/www/html/.composer \
#     composer config --global cache-dir /var/www/html/.composer

# Copy project files
# COPY . .

# Set permissions
# RUN chmod -R 777 storage bootstrap/cache

# Expose port
# EXPOSE 8000

# Run Laravel application
# CMD php artisan serve --host=0.0.0.0 --port=8000
