FROM php:7.2-apache-stretch
RUN apt-get update && apt-get install -y \
    		libfreetype6-dev \
    		libpng-dev \
    		libwebp-dev \
    		libjpeg62-turbo-dev \
    		libmcrypt-dev \
    		libzip-dev \
            zip \
    		git \
    		mariadb-client \
			cron \
    && docker-php-ext-install \
    pdo_mysql \
    gd \
    zip \
	sockets \
    && a2enmod \
    rewrite 
RUN pecl install -o -f redis \
	&&  rm -rf /tmp/pear \
	&&  docker-php-ext-enable redis
	
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
COPY wait-for-it.sh /usr/local/bin/wait-for-it
COPY start.sh /usr/local/bin/start
RUN chown -R www-data:www-data /var/www/html \
    && chmod u+x /usr/local/bin/start \
    && a2enmod rewrite
	
CMD ["/usr/local/bin/start"]