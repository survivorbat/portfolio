SHELL := /bin/bash

MAKEFLAGS := --silent --no-print-directory

.DEFAULT_GOAL := help

.PHONY := help build up down restart

help:
	@echo "Please use 'make <target>' where <target> is one of"
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z\._-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build images
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio build

up: ## Start containers in development mode
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio up -d

down: ## Stop containers
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio down

restart: ## Restart containers
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p porfolio restart

terraform.init: ## Init terraform
	cd terraform/digitalocean && terraform init

terraform.plan: ## Plan the terraform configuration
	cd terraform/digitalocean && terraform plan

terraform.apply: ## Apply the terraform configuration
	cd terraform/digitalocean && terraform apply -auto-approve

terraform.destroy: ## Destroy the terraform configuration
	cd terraform/digitalocean && terraform destroy
