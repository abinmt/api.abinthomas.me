FROM php:7.4-fpm

# Install modules.
RUN buildDeps="libpq-dev libzip-dev libicu-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev libmagickwand-6.q16-dev libxslt-dev zip unzip" && \
    apt-get update && \
    apt-get install -y $buildDeps --no-install-recommends && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install \
        opcache \
        pdo \
        pdo_pgsql \
        pgsql \
        pdo_mysql \
        mysqli \
        sockets \
        xsl \
        intl



# Install Composer.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Creating /app to store the code base.
RUN mkdir /app

# Set the application directory.
WORKDIR /app

# Install our packages.
COPY composer.json /app/composer.json
RUN composer install

# Copy our code from the current folder to /app inside the container.
COPY . .

LABEL maintainer="Abin Thomas <abinmt@gmail.com>"

# Define our command to be run when launching the container.
CMD ["php-fpm"]