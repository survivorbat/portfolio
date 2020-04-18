ARG node_version=13.7.0
ARG nginx_jinja_version=1.17.9

FROM node:${node_version}-alpine AS build

WORKDIR /app

COPY . /app

RUN npm install \
 && npm run test:nowatch \
 && npm run build

FROM survivorbat/nginx-jinja2:${nginx_jinja_version} AS run

RUN mkdir -p /var/www/html/maarten.dev

COPY ./nginx /
COPY --from=build /app/build /var/www/html/maarten.dev
