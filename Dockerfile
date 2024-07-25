FROM php:8.3-alpine

RUN  curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

COPY . /app

WORKDIR /app
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install --no-interaction --no-progress --no-suggest

CMD ["php", "index.php"]
