FROM php:8.3-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libzip-dev \
    libpq-dev \
    zip \
    nodejs \
    npm \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

# PHP deps
RUN composer install --no-dev --optimize-autoloader

# JS deps + Vite
RUN npm install
RUN npm run build

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan config:clear && php artisan cache:clear && php artisan serve --host=0.0.0.0 --port=10000
