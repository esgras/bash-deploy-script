deploy:
	@composer install -o --no-dev -n --no-progress
	@composer dump-env prod
	@php bin/console cache:clear && bin/console cache:warmup
	@php bin/console d:m:m -n

.PHONY: deploy
