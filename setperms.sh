#!/bin/sh

if [ -d /var/www/html/domotiyii ]; then

	sudo chown -R www-data:www-data /var/www/html/domotiyii/protected/runtime
	sudo chown -R www-data:www-data /var/www/html/domotiyii/assets
	sudo chown -R www-data:www-data /var/www/html/domotiyii/protected/views
	sudo chown -R www-data:www-data /var/www/html/domotiyii/protected/controllers
	sudo chown -R www-data:www-data /var/www/html/domotiyii/protected/models

fi

if [ -d /var/www/domotiyii ]; then

	sudo chown -R www-data:www-data /var/www/domotiyii/protected/runtime
	sudo chown -R www-data:www-data /var/www/domotiyii/assets
	sudo chown -R www-data:www-data /var/www/domotiyii/protected/views
	sudo chown -R www-data:www-data /var/www/domotiyii/protected/controllers
	sudo chown -R www-data:www-data /var/www/domotiyii/protected/models

fi
