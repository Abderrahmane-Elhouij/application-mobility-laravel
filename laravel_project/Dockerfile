FROM php:8.0

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
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

# Install Laravel dependencies and optimize autoloader
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist \
    && composer dump-autoload --optimize

# Set permissions and create required directories
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage \
    && mkdir -p /var/www/html/storage/framework/sessions \
    && chmod -R 775 /var/www/html/storage/framework

# Expose port 8000 for PHP's built-in server
EXPOSE 8000

# Start PHP's built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
