FROM php:8.2-fpm

# Установка зависимостей с очисткой кеша
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    fish \
    git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Установка PHP расширений
RUN docker-php-ext-install \
    pdo pdo_pgsql \
    zip \
    gd \
    pcntl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

# Создаем пользователя с таким же UID как на хосте
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN groupadd -g ${GROUP_ID} user \
    && useradd -u ${USER_ID} -g user -m user \
    && mkdir -p /app \
    && chown user:user /app

# Рабочая директория и пользователь
WORKDIR /app
USER user
