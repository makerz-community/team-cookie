FROM php:7.2-fpm
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring
COPY php.ini /usr/local/etc/php/
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install git -y
WORKDIR /var/www/html/