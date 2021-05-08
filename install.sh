composer install -o --no-dev -n --no-progress
composer dump-env prod
php bin/console cache:clear && bin/console cache:warmup
php bin/console d:d:c --if-not-exists
php bin/console d:m:m -n

php bin/console create:note
