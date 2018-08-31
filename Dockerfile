FROM php:7.2-cli

COPY . /usr/src/api.abinthomas.me
WORKDIR /usr/src/api.abinthomas.me
CMD php -S localhost:8080
EXPOSE 8080