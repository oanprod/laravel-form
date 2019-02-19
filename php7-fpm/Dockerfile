FROM php:7.1-fpm-alpine
MAINTAINER Laurent Masforne <laurent.masforne@gmail.com>
ENV PHP_XDEBUG_VERSION 2.5.0
RUN apk add --update \
        libbz2 \
        libintl \
        libxml2-dev \
        libmcrypt-dev \
        postgresql-dev \
        libmcrypt \
        memcached \
        zlib-dev \
        wget \
        icu \
        icu-libs \
        icu-dev \
        freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev \
        git \
        openldap-dev \
        nano

RUN docker-php-source extract \
    && curl -L -o /tmp/xdebug-$PHP_XDEBUG_VERSION.tgz http://xdebug.org/files/xdebug-$PHP_XDEBUG_VERSION.tgz \
    && tar xfz /tmp/xdebug-$PHP_XDEBUG_VERSION.tgz \
    && rm -r \
        /tmp/xdebug-$PHP_XDEBUG_VERSION.tgz \
    && mv xdebug-$PHP_XDEBUG_VERSION /usr/src/php/ext/xdebug

RUN docker-php-ext-install \
        intl \
        iconv \
        mcrypt \
        mbstring \
        mysqli \
        pdo \
        pdo_mysql \
        xdebug \
        zip \
        gd \
        exif \
        opcache \
        soap \
    && rm -rf /var/cache/apk/*


RUN docker-php-source delete \
    && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

RUN docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
      NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
      docker-php-ext-install -j${NPROC} gd && \
      apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/ \
    && docker-php-ext-configure intl \
	&& docker-php-ext-install pgsql pdo_pgsql
RUN docker-php-ext-configure ldap --with-libdir=lib/ \
    && docker-php-ext-install ldap

COPY symfony.ini /usr/local/etc/php/php.ini

RUN rm -f /usr/local/etc/php-fpm.d/www.conf.default
ADD symfony.pool.conf /usr/local/etc/php-fpm.d/
RUN rm -f /usr/local/etc/php-fpm.d/www.conf

RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories
RUN apk --no-cache add shadow && usermod -u 1000 www-data

CMD ["php-fpm"]

## Let's set the working dir
WORKDIR /var/www/
EXPOSE 9000
