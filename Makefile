#!/usr/bin/env make
# SHELL = sh -xv

TAG := muscobytes/php-cli-8.3

DOCKER := docker -f ".docker/php-8.3/Dockerfile"

.PHONY: help
help:  ## Shows this help message
	@echo "  Usage: make [target]\n\n  Targets:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' "$(shell pwd)/Makefile" | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "   🔸 \033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: build
build:
	docker build -f ".docker/php-8.3/Dockerfile" -t ${TAG} .

.PHONY: shell
shell:
	docker run -ti -v "./:/var/www/html" $(TAG) sh
