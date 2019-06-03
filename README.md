# My portfolio

This repository contains the code that is used to display my (new) personal portfolio
over at [maarten.dev](https://maarten.dev). This website has a simple static frontend
and a nodejs backend. Html code is compiled from Twig templates and css is generated
from scss files. This project is deployed using Docker and Ansible.

## Prerequisites

You have to have docker and docker-compose installed in order to get this project
up and running. It is also advisable to have Make installed in order to use the Makefile.

## Getting started

1. GIT clone the repository
2. Run `make up`
3. Visit [https://localhost](https://localhost) to get started

Please be aware that your browser will notify you that the SSL/TLS certificate is not trusted.
You may **ignore** this warning since the development version of the project uses
self-signed certificates that were generated when you started the project.

## Known quirks

* Static files are currently served through the node backend, I prefer to serve them
through the Nginx webserver in order to let Nginx do the heavy lifting with static files
