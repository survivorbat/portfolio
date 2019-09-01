# My portfolio

[![Build Status](https://travis-ci.com/survivorbat/portfolio.svg?branch=master)](https://travis-ci.com/survivorbat/portfolio) 

This repository contains the code that is used to display my (new) personal portfolio
over at [maarten.dev](https://maarten.dev). The application consists of a simple PHP Symfony application
with an admin backend. This project is deployed using Docker and Ansible.

This branch is currently not in sync with the production website, this will be sresolved in the future.

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

