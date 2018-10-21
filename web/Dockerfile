FROM nginx:1-alpine

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

COPY nginx/nginx.conf /etc/nginx/nginx.conf
COPY nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

COPY ./public /var/www/html