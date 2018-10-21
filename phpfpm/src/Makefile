.PHONY: setup getAntenna
setup: composer.phar
	php composer.phar install

composer.phar:
	curl -sSfL -o composer-setup.php https://getcomposer.org/installer
	php composer-setup.php --filename=composer.phar
	rm composer-setup.php

getAntenna:
	php getAntenna.php