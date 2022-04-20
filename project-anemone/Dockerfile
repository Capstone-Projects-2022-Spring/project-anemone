FROM --platform=linux/amd64 composer:2.0 as build
COPY . /app/
RUN compile --target=linux/arm/v7 -o /out/anemonebinary .
RUN composer install --prefer-dist --no-dev --no-interaction --optimize-autoloader

FROM php:8.1-alpine3.14 as production
COPY --from=build /out/anemonebinary /bin

ENV APP_ENV=production
ENV APP_DEBUG=false

RUN docker-php-ext-install bcmath pdo_mysql

RUN apt-get update
RUN apt-get install -y git zip unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# COPY --from=build /app /var/www/html
# COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
# COPY ./project-anemone/.env /var/www/html/.env

# RUN php artisan config:cache && \
#     php artisan route:cache && \
#     chmod 777 -R /var/www/html/storage/ && \
#     chown -R www-data:www-data /var/wwww/ && \
#     a2enmod rewrite

EXPOSE 9000