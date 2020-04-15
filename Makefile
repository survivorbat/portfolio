SHELL := /bin/bash

MAKEFLAGS := --silent --no-print-directory

.DEFAULT_GOAL := help

.PHONY := help build up down restart terraform.init terraform.plan terraform.apply terraform.destroy

help:
	@echo "Please use 'make <target>' where <target> is one of"
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z\._-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build images
	docker-compose -f src/docker-compose.yml -p portfolio build

up: ## Start containers in development mode
	docker-compose -f src/docker-compose.yml -p portfolio up -d

down: ## Stop containers
	docker-compose -f src/docker-compose.yml -p portfolio down

restart: ## Restart containers
	docker-compose -f src/docker-compose.yml -p porfolio restart

terraform.init: ## Init terraform
	cd common/terraform && terraform init

terraform.validate: ## Validate terraform
	cd common/terraform && terraform validate

terraform.fmt: ## Format terraform code
	cd common/terraform && terraform fmt

ansible.lint: # Run ansible-lint
	docker run --rm -v $(CURDIR)/common/ansible:/app survivorbat/ansible:v0.4 ansible-lint /app/site.yaml
