brain-games:
	php bin/brain-games.php

lint:
	composer run -- phpcs --standard=PSR12 src bin
