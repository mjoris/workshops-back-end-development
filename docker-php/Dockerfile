FROM php:7.4-apache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get install -y libmcrypt-dev && pecl install mcrypt-1.0.3 && docker-php-ext-enable mcrypt
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
