FROM php:8.2-apache


RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    curl \
    && docker-php-ext-install pdo_mysql zip


RUN a2enmod rewrite


ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs


COPY . /var/www/html


WORKDIR /var/www/html


COPY package*.json ./


RUN npm install


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN composer install


RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


EXPOSE 80

CMD ["apache2-foreground"]

