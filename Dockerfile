FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html/

RUN mkdir -p /var/www/html/data && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 777 /var/www/html/data

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
