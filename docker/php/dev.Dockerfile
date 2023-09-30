FROM php:8.2-fpm as dev

RUN usermod -u 1000 www-data

WORKDIR /var/www/html

COPY ./config/dev.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./config/php-dev.ini /usr/local/etc/php/conf.d/php.ini

RUN apt-get update && apt-get install -y \
        vim \
        libicu-dev \
        zlib1g-dev \
        libpng-dev \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        && docker-php-ext-configure intl \
        && docker-php-ext-install intl \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd && apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git
RUN docker-php-ext-install mysqli zip pdo_mysql bcmath
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install opcache
RUN apt-get update && apt install mariadb-client -y

RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

COPY . .
# RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]

