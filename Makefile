#deploy-standard:
#	@composer install -o --no-dev -n --no-progress
#	@composer dump-env prod
#	@php bin/console cache:clear && bin/console cache:warmup
#	@php bin/console d:d:c --if-not-exists
#	@php bin/console d:m:m -n
#
#
#deploy-standard:
#	@composer dump-env prod

deploy-custom:
#	@php bin/console create:note

deploy: deploy-standard deploy-custom

.PHONY: deploy deploy-standard deploy-custom
