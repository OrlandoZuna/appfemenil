# CARGAMOS IMAGEN DE PHP MODO ALPINE SUPER REDUCIDA
#FROM elrincondeisma/octane:latest
FROM php:7

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql
#RUN curl -sS https://getcomposer.org/installer​ | php -- \
    # --install-dir=/usr/local/bin --filename=composer

#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

WORKDIR /app
COPY . /app
RUN rm -rf /app/vendor
RUN rm -rf /app/composer.lock
RUN composer install
#RUN composer require laravel/octane spiral/roadrunner
COPY .env.example .env
RUN mkdir -p /app/storage/logs
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:clear

CMD php artisan serve --host=0.0.0.0 --port=8000
#RUN php artisan octane:install --server="swoole"
#CMD php artisan octane:start --server="swoole" --host="0.0.0.0"

EXPOSE 8000