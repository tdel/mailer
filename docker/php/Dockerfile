# ./docker/php/Dockerfile
FROM php:7.4-fpm

RUN docker-php-ext-install pdo_mysql

#RUN pecl install apcu

#RUN apt-get update && \
#apt-get install -y \
#libzip-dev

#RUN docker-php-ext-install zip
#RUN docker-php-ext-enable apcu

WORKDIR /var/www/mailer

COPY --chown=1000:1000 . /var/www/mailer

EXPOSE 9000