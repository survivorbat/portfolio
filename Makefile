SHELL := /bin/bash

.PHONY: help

.DEFAULT_GOAL := help

help:
	@echo "Please use 'make <target>' where <target> is one of"
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z\._-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

### Development commands ###

up: ## Up containers in development mode
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio up -d
	@echo Great! The application will soon appear over at: https://localhost/

down: ## Down containers in development mode
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio down

restart: ## Restart containers in development mode
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio restart

build: ## Build containers
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio build

prod.up:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml -p portfolio up -d

prod.down:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml -p portfolio down

prod.restart:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml -p portfolio restart

prod.build:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml -p portfolio build