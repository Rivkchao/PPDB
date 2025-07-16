# Gunakan image PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Pasang Composer dari image resmi Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy seluruh source code ke container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Copy .htaccess (opsional, Laravel biasanya sudah ada)
# Pastikan folder public/ punya index.php
# Apache default DocumentRoot udah ke /var/www/html/public

# Ubah DocumentRoot Apache ke folder public Laravel
RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

# Expose port 80 untuk Apache
EXPOSE 80

# Jalankan Apache di foreground
CMD ["apache2-foreground"]
