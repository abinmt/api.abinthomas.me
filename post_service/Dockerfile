FROM php:fpm

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

# Creating /app to store the code base.
RUN mkdir /post_service

# Set the application directory.
WORKDIR /post_service

# Copy our code from the current folder inside the container.
COPY . .

LABEL maintainer="Abin Thomas <abinmt@gmail.com>"