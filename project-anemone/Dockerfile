FROM --platform=linux/amd64 composer:2.0 as build
COPY . /app/
RUN compile --target=linux/arm/v7 -o /out/anemonebinary .
RUN composer install --prefer-dist --no-dev --no-interaction --optimize-autoloader

FROM php:8.1-alpine3.14 as production
ENV APP_ENV=production
ENV APP_DEBUG=false

RUN docker-php-ext-install bcmath pdo_mysql
 # Create symlink so programs depending on `php` still function
RUN ln -s /usr/bin/php8 /usr/bin/php


# Configure nginx
COPY config/nginx.conf /etc/nginx/nginx.conf
# Configure supervisord
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup document root
RUN mkdir -p /var/www/html

# Make sure files/folders needed by the processes are accessable when they run under the anemone user
RUN chown -R anemone.anemone /var/www/html && \
  chown -R anemone.anemone /run && \
  chown -R anemone.anemone /var/lib/nginx && \
  chown -R anemone.anemone /var/log/nginx

# Switch to use a non-root user from here on
USER anemone

# Add application
WORKDIR /var/www/html
COPY --chown=anemone src/ /var/www/html/

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Optimizing Configuration loading
RUN php artisan config:cache
# Optimizing Route loading
RUN php artisan route:cache
# Optimizing View loading
RUN php artisan view:cache

# Expose the port nginx is reachable on
EXPOSE 8080