ARG nginx_jinja_version=1.17.9

FROM survivorbat/nginx-jinja2:${nginx_jinja_version} AS run

RUN mkdir -p /var/www/html/maarten.dev

COPY ./nginx /
COPY src/ /var/www/html/maarten.dev
