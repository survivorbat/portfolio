FROM nginx:1.17.2-alpine

RUN apk add --no-cache --update \
    py-pip \
 && pip install j2cli

COPY . /

ENTRYPOINT /bin/docker-entrypoint
