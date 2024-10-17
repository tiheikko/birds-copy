FROM php:8.3-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    git \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd soap

RUN groupadd --force -g 1000 www-data

COPY . /var/www
COPY --chown=www:www . /var/www

RUN chown -R 775 /var/www/html
RUN chmod -R 775 /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
