FROM php:7.4-fpm-alpine
LABEL maintainer="Harald Leithner <harald.leithner@community.joomla.org> (@HLeithner)"

# Disable remote database security requirements.
ENV JOOMLA_INSTALLATION_DISABLE_LOCALHOST_CHECK=1

# entrypoint.sh dependencies
RUN apk add --no-cache \
# Dependancy for intl \
        icu-libs \
        libintl \
	bash

# Install PHP extensions
RUN set -ex; \
	\
	apk add --no-cache --virtual .build-deps \
		$PHPIZE_DEPS \
		# Build dependencies for gd \
        	freetype-dev \
       	libjpeg-turbo-dev \
        	libpng-dev \
		autoconf \
		bzip2-dev \
		gmp-dev \
		libmcrypt-dev \
		libmemcached-dev \
		libzip-dev \
		openldap-dev \
		pcre-dev \
		postgresql-dev \
		icu-dev \
		# Build dependency for mbstring \
        	oniguruma-dev \
        	 # Build dependencies for XML part \
        	libxml2-dev \
        	ldb-dev \
	; \
	\
	docker-php-ext-configure gd --with-freetype --with-jpeg; \
	docker-php-ext-configure gmp; \
	docker-php-ext-configure ldap; \
	docker-php-ext-configure mysqli; \
      	docker-php-ext-configure pdo_mysql; \
      	docker-php-ext-configure pdo_pgsql; \
      	docker-php-ext-configure mbstring --enable-mbstring; \
	docker-php-ext-configure soap; \
	docker-php-ext-configure pcntl --enable-pcntl; \
	docker-php-ext-configure opcache --enable-opcache; \
	docker-php-ext-install -j "$(nproc)" \
		bz2 \
		gd \
		gmp \
		ldap \
		intl \
		mysqli \
		pdo_mysql \
		pdo_pgsql \
		pgsql \
		zip \
		soap \
		mbstring \
		opcache \
		pcntl \
	; \
	\
# pecl will claim success even if one install fails, so we need to perform each install separately
	pecl install APCu-5.1.18; \
	pecl install mcrypt-1.0.3; \
	pecl install memcached-3.1.5; \
	pecl install redis-4.3.0; \
	\
	docker-php-ext-enable \
		apcu \
		mcrypt \
		memcached \
		redis \
	; \
	\
	runDeps="$( \
		scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
		| tr ',' '\n' \
		| sort -u \
		| awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
		)"; \
	apk add --virtual .joomla-phpext-rundeps $runDeps; \
	apk del .build-deps

VOLUME /var/www/html

COPY joomla.tar joomla.tar
RUN mkdir /usr/src/joomla && tar -xf joomla.tar -C /usr/src/joomla && chown -R www-data:www-data /usr/src/joomla

RUN  rm -rf /usr/local/etc/php/php.ini
COPY php.ini /usr/local/etc/php/php.ini
# Copy init scripts and custom .htaccess
COPY docker-entrypoint.sh /entrypoint.sh
COPY makedb.php /makedb.php
COPY db.sql /db.sql
COPY configuration.php /configuration.php

ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]
