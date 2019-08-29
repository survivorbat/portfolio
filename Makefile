SHELL := /bin/bash

MAKEFLAGS := --silent --no-print-directory

.DEFAULT_GOAL := help

help:
	@echo "Please use 'make <target>' where <target> is one of"
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z\._-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build images
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio build

up: ## Start containers in development mode
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio up -d

down: ## Stop containers
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio down

php.restart: ## Restart php container
	docker restart portfolio_php-fpm_1

php.run: ## Run a command in the php container, requires a 'cmd' argument
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio exec -u php php-fpm ${cmd}

php.sh: ## Open the shell of the php container
	docker exec -u php -it portfolio_php-fpm_1 sh

php.logs: ## Get the php logs in realtime
	docker logs -f portfolio_php-fpm_1

php.fix: ## Run the php-cs-fixer over all the code in the repository
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio exec -u php php-fpm /app/src/vendor/bin/php-cs-fixer fix /app/src/src
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio exec -u php php-fpm /app/src/vendor/bin/php-cs-fixer fix /app/src/tests

php.stan: ## Run phpstan to check php code
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio exec -u php php-fpm /app/src/vendor/bin/phpstan analyze -c /app/src/phpstan.neon --level=2 -a autoload.php /app/src/src

php.hooks: hooks
hooks: ## Run hooks like phpstan and php-cs-fixer
	make php.fix
	make php.stan
	make js.fix

node.sh: node.shell
node.shell: ## Enter the shell of the node container
	docker exec -itu node portfolio_node_1 sh

js.fix: node.fix
node.fix: ## Run prettier over the code
	docker exec -itu node portfolio_node_1 /app/node_modules/prettier/bin-prettier.js fix --write /app/src/**/*

test: ## Run phpunit tests
	make php.run cmd="/app/src/bin/phpunit"

test.clear: ## Clear the cache of the test environment
	make php.run cmd="bin/console cache:clear --env=test --no-debug"

test.unit: ## Run phpunit unit tests
	make php.run cmd="/app/src/bin/phpunit --testsuite=unit"

test.integration: ## Run phpunit integration tests
	make php.run cmd="/app/src/bin/phpunit --testsuite=integration"

test.functional: ## Run phpunit functional tests, please beware that this requires the application to be running
	make php.run cmd="/app/src/bin/phpunit --testsuite=functional"

test.coverage: ## Run unit tests with PHPunit and create a coverage report in $PWD/PHPunitReport
	make php.run cmd="/app/src/bin/phpunit -c /app/src --coverage-html /app/src/test-coverage"
	@echo 'Generated a coverage report in src/test-coverage!'

composer.install: ## Run composer install in the php container in development
	make php.run cmd="bin/composer install"

composer.update: ## Run composer update in the php container in development
	make php.run cmd="bin/composer update"

fixtures: ## Throw away the database and fill it with test data (only in development!)
	make php.run cmd="bin/console doctrine:fixtures:load -n"

migrations.diff: ## Generate a new migration based on the ORM files
	make php.run cmd="bin/console doctrine:cache:clear-metadata"
	make php.run cmd="bin/console doctrine:migrations:diff"

migrations.migrate: ## Migrate the database
	make php.run cmd="bin/console doctrine:migrations:migrate -n"

schema.validate: ## Validate the mapping settings
	make php.run cmd="bin/console doctrine:cache:clear-metadata"
	make php.run cmd="bin/console doctrine:schema:validate"

database.reset: ## Delete and recreate the database, then fill it with fixture data
	echo ""
	echo "I sincerely hope you know what you're doing..."
	echo "Deleting database..."
	echo ""
	make php.run cmd="bin/console doctrine:database:drop --force"
	make php.run cmd="bin/console doctrine:database:create"
	make migrations.migrate
	make fixtures

cache.clear: ## Clear the cache
	make php.run cmd="bin/console cache:clear"
	make php.run cmd="bin/console doctrine:cache:clear-metadata"
	make php.run cmd="bin/console doctrine:cache:clear-query"
	make php.run cmd="bin/console doctrine:cache:clear-result"

restart: ## Restart containers
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml -p portfolio restart

ansible.vault.password: ## Input the vault password and save it to ../.devnl-backend-vault-password
	@echo "Please ask one of your fellow developers for the vault password and input it here:"
	@echo
	read -s -p "Enter Password: " password; \
	echo $$password > ${CURDIR}/../.portfolio-vault-password
	@echo "Thanks!"

ansible.vault.expand: ## Expose ansible-vault secrets, assuming password file exists
	docker run \
		--rm \
		--workdir=/ansible \
		-v ${CURDIR}/../.portfolio-vault:/rootdir \
		-v ${CURDIR}/ansible:/ansible \
		-v ${CURDIR}/../.portfolio-vault-password:/.password \
		-it survivorbat/ansible:v0.2 \
		ansible-playbook expand-secrets-dev.yml -e output_folder=/rootdir --vault-password-file=/.password -e uid=$(shell id -u) -e gid=$(shell id -g)

ansible.vault.edit: ## Edit the vault file to remove or add secrets, assuming password file exists
	docker run \
		--rm \
		--workdir=/ansible \
		-v $(CURDIR)/ansible:/ansible \
		-v ${CURDIR}/../.portfolio-vault-password:/.password \
		-it survivorbat/ansible:v0.2 \
		ansible-vault edit /ansible/shared_vars/vault.yml --vault-password-file=/.password

ansible.lint: ## Run Ansible Lint
	docker run \
		--rm \
		--workdir=/ansible \
		-v $(CURDIR)/ansible:/ansible \
		-it survivorbat/ansible:v0.2 \
		ansible-lint /ansible/site.yml
