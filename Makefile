brain-games:
	php bin/brain-games.php

setup:
	composer install

lint:
	composer run -- phpcs --standard=PSR12 src bin
