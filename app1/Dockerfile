FROM php:8.3-apache
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    default-libmysqlclient-dev \
    && docker-php-ext-install pdo pdo_mysql