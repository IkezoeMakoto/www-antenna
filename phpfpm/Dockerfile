FROM php:7.2-fpm-alpine

# common
RUN apk update && \
    apk add make less vim git shadow && \
    rm -rf /var/cache/apk/*

# timezone -> tokyo
RUN apk update && \
    apk add tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata && \
    rm -rf /var/cache/apk/*

RUN addgroup -g 2000 -S webcontentsowners
RUN adduser -s /sbin/nologin -G webcontentsowners -D -H nginx

COPY conf/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY conf/php/php.ini /usr/local/etc/php/php.ini

COPY src/ /var/www/html