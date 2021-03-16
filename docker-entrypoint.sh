#!/bin/bash

set -e
if ! [ -e index.php -a \( -e libraries/cms/version/version.php -o -e libraries/src/Version.php \) ]; then
                echo >&2 "Joomla not found in $(pwd) - copying now..."

                if [ "$(ls -A)" ]; then

                        ( set -x; ls -A; sleep 10 )
                fi

                tar cf - --one-file-system -C /usr/src/joomla . | tar xf -

                if [ ! -e .htaccess ]; then
                        # NOTE: The "Indexes" option is disabled in the php:apache base image so remove it as we enable .htaccess
                        sed -r 's/^(Options -Indexes.*)$/#\1/' htaccess.txt > .htaccess
                        chown www-data:www-data .htaccess
                fi

                echo >&2 "Complete! Joomla has been successfully copied to $(pwd)"
   

if ! [ -d /var/www/html/images ]; then
		mkdir /var/www/html/_upload
	  	cp /configuration.php /var/www/html/
                echo >&2 "Inicializando carpeta de imagenes"
                mkdir /var/www/html/images
		cp -r /var/www/html/_images/* /var/www/html/images
		chown -R www-data:www-data /var/www/html
		echo >&2 "Conectando a $JOOMLA_DB_USER"
        	php /makedb.php "$JOOMLA_DB_HOST" "$JOOMLA_DB_USER" "$JOOMLA_DB_PASSWORD" "$JOOMLA_DB_NAME"
		fi


       

        echo >&2 "========================================================================"
        echo >&2
        echo >&2 " Este contenedor esta corriendo Joomla alpine!"
        echo >&2 "========================================================================"
fi

exec "$@"
