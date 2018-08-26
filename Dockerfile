FROM php:7.1-apache

RUN apt-get update -y && \
    apt-get install -y --no-install-recommends libpq-dev \
                                               libmcrypt-dev \
                                               libreadline-dev \
                                               curl \
                                               zip \
                                               unzip \
                                               zlib1g-dev \
                                               libicu-dev \
                                               g++ \
                                               git \
                                               zip \
                                               unzip \
                                               libmagickwand-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure intl
RUN docker-php-ext-install mbstring pdo pdo_mysql mcrypt intl zip
RUN docker-php-source extract
RUN pecl install xdebug imagick
RUN docker-php-ext-enable xdebug imagick
RUN docker-php-source delete

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

COPY docker/php.ini /usr/local/etc/php/
COPY docker/apache_config /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
