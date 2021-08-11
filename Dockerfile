FROM php:7.4-fpm-alpine

RUN apk add --no-cache \
    autoconf \
    bash \
    bash-completion \
    bash-doc \
    curl \
    g++ \
    git \
    make \
    openssl-dev \
    vim \
    libzip-dev \
    nodejs \
    npm

RUN apk add --no-cache icu-dev \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-enable intl

RUN apk add --no-cache \
    oniguruma-dev \
    && docker-php-ext-install mbstring \
    && docker-php-ext-enable mbstring

RUN apk add --no-cache \
    bzip2-dev \
    && docker-php-ext-install -j$(nproc) bz2 \
    && docker-php-ext-enable bz2

RUN docker-php-ext-install bcmath
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

RUN docker-php-source extract \
    && pecl install opcache xdebug redis mongodb apcu \
    && echo "xdebug.remote_enable=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=1\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-ext-enable opcache xdebug redis mongodb apcu \
    && docker-php-source delete

WORKDIR /var/www

ENV SHELL /bin/bash

RUN rm -rf /var/www/html
RUN ln -s public html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

RUN chown -R www-data:www-data /var/www

EXPOSE 9000

ENTRYPOINT [ "php-fpm" ]
