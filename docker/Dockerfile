FROM php:7.4-alpine

RUN docker-php-ext-install pdo_mysql

COPY . /

#CMD php -S 0.0.0.0:80 app/public/index.php