FROM php:8.0-fpm-alpine as backend

ARG APP_ENV

LABEL maintainer="Christian Meinhard <christian.meinhard@live.com>"

ARG TIME_ZONE='Europe/Berlin'
ENV DEFAULT_TZ ${TIME_ZONE}

WORKDIR /var/www

# Import extension installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Install extensions
RUN install-php-extensions bcmath pdo_mysql redis

# Install the xdebug extension
RUN if [ ${APP_ENV} = local ]; then \
    install-php-extensions xdebug \
;fi

# Install pcntl for Laravel/Horizon
RUN docker-php-ext-install pcntl

# Install Composer
COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

# Install extra packages
RUN apk --no-cache add bash mysql-client

#Set correct time
RUN apk add tzdata\
    && cp /usr/share/zoneinfo/${DEFAULT_TZ} /etc/localtime \
    && apk del tzdata

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Add UID '1000' to www-data
RUN apk add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to www-data
USER www-data

FROM backend as worker

# Start worker
CMD ["php", "/var/www/artisan", "horizon"]
