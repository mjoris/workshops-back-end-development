FROM php:7.4-apache
ENV APACHE_DOCUMENT_ROOT=/var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get install -y libmcrypt-dev && pecl install mcrypt-1.0.3 && docker-php-ext-enable mcrypt
RUN apt-get install -y libzip-dev zip && docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www
VOLUME /usr/local/etc/php