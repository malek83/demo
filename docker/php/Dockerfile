FROM php:7.3-fpm

ARG SOURCE_DIR=/source

RUN mkdir ${SOURCE_DIR}

RUN apt-get update
RUN apt-get install -y libxml2-dev git zip

RUN docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR ${SOURCE_DIR}