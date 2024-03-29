FROM php:7.3-apache 
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y git \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
