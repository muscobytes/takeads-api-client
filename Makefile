#!/usr/bin/env make
# SHELL = sh -xv

TAG := muscobytes/php-cli-8.3

DOCKER_RUN := docker run -ti \
				-v "./:/var/www/html" \
				-v "./.docker/php-8.3/etc/php.ini:/usr/local/etc/php/php.ini"

.PHONY: help
help:  ## Shows this help message
	@echo "  Usage: make [target]\n\n  Targets:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' "$(shell pwd)/Makefile" | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "   🔸 \033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: build
build:
	docker build -f ".docker/php-8.3/Dockerfile" -t ${TAG} .

.PHONY: shell
shell:
	$(DOCKER_RUN) -e PHP_IDE_CONFIG="serverName=takeads-api-client" $(TAG) sh

.PHONY: test
test:
	$(DOCKER_RUN) $(TAG) vendor/bin/phpunit

.PHONY: tag
tag:
	git tag $(shell cat ./composer.json | jq -r .version)

.PHONY: untag
untag:
	git tag -d $(shell cat ./composer.json | jq -r .version)