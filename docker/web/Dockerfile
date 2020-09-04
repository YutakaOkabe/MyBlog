FROM php:7.4-apache

RUN set -ex apk --no-cache add postgresql-dev libpq-dev && \
    apt-get update && apt-get install -y\
    vim zip unzip\
    less \
    git ssl-cert rsyslog cron \
    libzip-dev libicu-dev libpq-dev \
    libonig-dev libfreetype6-dev libjpeg-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring intl gd \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY php.ini /usr/local/etc/php/

ENV APACHE_DOCUMENT_ROOT /var/www/html/webroot

RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf