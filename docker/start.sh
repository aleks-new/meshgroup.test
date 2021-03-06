#!/bin/bash
set -e
role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-production}
if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi
if [ "$role" = "web" ]; then
	cd /var/www/html
	composer install
    exec apache2-foreground
elif [ "$role" = "scheduler" ]; then
	wait-for-it rabbitmq-management:5672 -t 0
	wait-for-it web:80 -t 0
	php /var/www/html/artisan queue:work --queue=rows,default
    while [ true ]
    do
      php /var/www/html/artisan schedule:run --verbose --no-interaction &
      sleep 60
    done
elif [ "$role" = "websockets" ]; then
	wait-for-it web:80 -t 0
	php /var/www/html/artisan websockets:serve
	exit 1
else
    echo "Could not match the container role \"$role\""
    exit 1
fi