# My portfolio

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d75c12ea668d439aa28819e9cb31b6cf)](https://app.codacy.com/app/survivorbat/portfolio?utm_source=github.com&utm_medium=referral&utm_content=survivorbat/portfolio&utm_campaign=Badge_Grade_Dashboard)

This repository contains the code that is used to display my (new) personal portfolio
over at [maarten.dev](https://maarten.dev). /** TODO */. This project is deployed using Docker and Ansible.

## Prerequisites

You have to have docker and docker-compose installed in order to get this project
up and running. It is also advisable to have Make installed in order to use the Makefile.

## Getting started

1. Add the lines from `docs/hosts.txt` to your `/etc/hosts file
1. Run `make up`
1. Visit [https://localhost](https://localhost) to get started

Please be aware that your browser will notify you that the SSL/TLS certificate is not trusted.
You may **ignore** this warning since the development version of the project uses
self-signed certificates that were generated when you started the project.

## Known quirks

* None yet!

