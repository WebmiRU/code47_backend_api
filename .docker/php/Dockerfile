FROM php:8.5-fpm-alpine

# Системные зависимости для Laravel
RUN apk add --no-cache \
    libpq-dev \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    linux-headers

# Установка расширений
RUN docker-php-ext-install pdo pdo_pgsql pgsql bcmath gd mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www