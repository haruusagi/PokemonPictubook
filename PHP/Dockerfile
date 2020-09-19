FROM php:7.2-fpm
COPY php.ini /usr/local/etc/php/
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-install pdo_mysql