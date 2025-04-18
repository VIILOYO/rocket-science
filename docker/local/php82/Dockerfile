FROM php:8.2-fpm

# Установка зависимостей
RUN apt update && apt install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    git \
    fish

# Установка PHP расширений
RUN docker-php-ext-install \
    pdo pdo_pgsql \
    zip \
    gd \
    pcntl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Настройка рабочей директории
WORKDIR /app
