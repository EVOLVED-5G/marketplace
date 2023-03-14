stop:
	docker compose stop
shell:
	docker compose exec php /bin/bash
start:
	docker compose up --detach
destroy:
	docker compose down --volumes
build:
	docker compose up --detach --build
migrate:
	docker compose run --rm artisan migrate
seed:
	docker compose run --rm artisan db:seed
composer_install:
	docker compose run --rm composer install
npm_install:
	docker compose run --rm npm install
npm_run_dev:
	docker compose run --rm npm run dev
npm_run_prod:
	docker compose run --rm npm run prod
npm_run_watch:
	docker compose run --rm npm run watch
