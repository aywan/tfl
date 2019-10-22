##
## Production build.
##
FROM php:7.3.6-fpm-alpine3.9 as prod

ARG XHPROF_VER=v2.0.2
ARG MEMCACHED_VER=3.1.3

RUN : "------ user works --------" \
    && deluser xfs \
    && deluser www-data \
    && addgroup -g 33 www-data \
    && adduser -G www-data -u 33 -g "php-fpm user" -s /bin/nologin -D www-data \
    \
    && : "------ lib dependency ----" \
    && apk add --no-cache --update \
      icu-dev \
      libpq \
      libmemcached \
      postgresql-dev \
      libpng-dev \
      openldap-dev \
      bash

RUN : "------ source building ------" \
    docker-php-source extract \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    && apk add --no-cache --update --virtual building-ext-deps \
      git \
      zlib-dev \
      libmemcached-dev \
    && docker-php-ext-install \
      gd \
      pdo_pgsql \
      intl \
      bcmath \
      zip \
      pcntl \
      opcache \
    \
   && pecl install memcached-${MEMCACHED_VER} \
    \ && docker-php-ext-enable memcached \
    \
   && pecl install timezonedb \
    \ && docker-php-ext-enable timezonedb \
    \
    && git clone --depth=1 https://github.com/longxinH/xhprof /usr/src/xhprof \
      && cd /usr/src/xhprof/extension \
      && phpize \
      && ./configure \
      && make \
      && make install \
      && cd / \
      && rm -rf /usr/src/xhprof || true \
    \
    && apk del building-ext-deps \
    && apk del .phpize-deps \
    && docker-php-source delete \
    && ln -s /usr/local/etc/php /etc/php \
    && cp -f ${PHP_INI_DIR}/php.ini-production ${PHP_INI_DIR}/php.ini

COPY ./docker/utils/suwd.sh /usr/bin/suwd

WORKDIR /code

### end prod build

##
## Developers build.
##
FROM prod as dev

ARG XDEBUG_VER=2.7.2

RUN docker-php-source extract \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    \
    && pecl install xdebug-${XDEBUG_VER} \
    && docker-php-ext-enable xdebug \
    \
    && apk del .phpize-deps \
    && docker-php-source delete \
    && : "----- composer -----" \
      && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
      && php composer-setup.php \
      && php -r "unlink('composer-setup.php');" \
      && mv ./composer.phar /composer.phar \
      && ln -s /composer.phar /usr/bin/composer \
      && composer global require hirak/prestissimo \
    && apk add --no-cache --update \
      mc \
      git

RUN cp -f ${PHP_INI_DIR}/php.ini-development ${PHP_INI_DIR}/php.ini
COPY ./docker/conf.d/dev/ ${PHP_INI_DIR}/conf.d/

### end dev build

##
## Production vendor install, code copy.
##
FROM dev as code-prod

COPY composer.json /code/
COPY composer.lock /code/
RUN composer install --prefer-dist --no-scripts --no-dev --no-autoloader && rm -rf /root/.composer
COPY . /code/
RUN composer dump-autoload --no-scripts --no-dev --optimize \
    && cd /code/ \
    && mkdir -p /var \
    && chown www-data:www-data /var


### end code-prod build

FROM prod as release

COPY --from=code-prod /code /code

### end release build
