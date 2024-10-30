FROM php:8.3-alpine

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /app

WORKDIR /app
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install --no-interaction --no-progress --no-suggest

CMD ["php", "index.php"]
EXPOSE 80
