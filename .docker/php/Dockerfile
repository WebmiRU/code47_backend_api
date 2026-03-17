FROM php:8.5-fpm-alpine

# 1. Принимаем аргументы
ARG UID=1000
ARG GID=1000

# 2. Устанавливаем системные зависимости (ОТ ROOT)
RUN apk add --no-cache \
    shadow \
    libpq-dev \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    linux-headers

# 3. Синхронизируем ID пользователя www-data с твоим хостом (ОТ ROOT)
RUN usermod -u $UID www-data && groupmod -g $GID www-data

# 4. Устанавливаем расширения PHP (ОТ ROOT)
RUN docker-php-ext-install pdo pdo_pgsql pgsql bcmath gd mbstring

# 5. Копируем Composer (ОТ ROOT)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Настраиваем рабочую директорию
WORKDIR /var/www

# 7. Переключаемся на непривилегированного пользователя для работы с файлами
USER www-data
