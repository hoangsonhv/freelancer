FROM php:8.2-fpm

# ----------------------
# PHP Extensions
# ----------------------
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    curl \
    vim \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install gd zip

# ----------------------
# Composer
# ----------------------
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# ----------------------
# NodeJS + Yarn (Dùng Node 18 – tối ưu cho Sage)
# ----------------------
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# ----------------------
# Workdir
# ----------------------
WORKDIR /var/www/html
