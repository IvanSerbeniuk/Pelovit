FROM php:8.3-cli

WORKDIR /var/www

# системные зависимости
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# копируем проект
COPY . .

# зависимости Laravel
RUN composer install --no-dev --optimize-autoloader

# права (важно)
RUN chmod -R 777 storage bootstrap/cache

# ключ приложения (если нет .env на сервере)
RUN php artisan key:generate

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
