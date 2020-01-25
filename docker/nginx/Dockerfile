FROM node:13.7.0-alpine AS build

WORKDIR /app

COPY src/frontend /app

RUN npm install \
 && npm run test:nowatch \
 && npm run build

FROM nginx:1.17.8-alpine

RUN apk add --no-cache --update \
    py-pip \
 && pip install j2cli \
 && mkdir -p /var/www/html

COPY ./docker/nginx /
COPY --from=build /app/build /var/www/html

ENTRYPOINT /bin/docker-entrypoint
