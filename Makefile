#!/usr/bin/env make
# SHELL = sh -xv

PHP_VERSION := 8.1

TAG := muscobytes/php-cli-$(PHP_VERSION)

DOCKER_RUN := docker run -ti \
				-v "./:/var/www/html"

.PHONY: help
help:  ## Shows this help message
	@echo "  Usage: make [target]\n\n  Targets:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' "$(shell pwd)/Makefile" | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "   🔸 \033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: build
build:
	docker build \
		--file ".docker/php/$(PHP_VERSION)/Dockerfile" \
		--tag ${TAG} .

.PHONY: shell
shell:
	$(DOCKER_RUN) -e PHP_IDE_CONFIG="serverName=takeads-api-client" $(TAG) sh

.PHONY: test
test:
	$(DOCKER_RUN) $(TAG) vendor/bin/phpunit

.PHONY: tag
tag:
	git tag v$(shell cat ./composer.json | jq -r .version)

.PHONY: untag
untag:
	git tag -d v$(shell cat ./composer.json | jq -r .version)
