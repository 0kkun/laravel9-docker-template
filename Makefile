project = temp

.PHONY: init
init:
	@make set-up
	@make build
	@make up
	@make composer-install
	@make npm-install
	docker-compose exec app php artisan key:generate
	@make restart
	@make migrate
	@make seed

.PHONY: restart
restart:
	@make down
	@make up

.PHONY: migrate
migrate:
	docker-compose exec app php artisan migrate:fresh

.PHONY: seed
seed:
	docker-compose exec app php artisan db:seed

.PHONY: set-up
set-up:
	cp server/.env.example server/.env

.PHONY: build_c
build_c:
	docker-compose build --no-cache --force-rm

.PHONY: build
build:
	docker-compose build

.PHONY: up
up:
	docker-compose up -d

.PHONY: composer-install
composer-install:
	docker-compose exec app composer install

.PHONY: npm-install
npm-install:
	docker-compose exec app npm install

.PHONY: stop
stop:
	docker-compose stop

.PHONY: down
down:
	docker-compose down --remove-orphans

.PHONY: open_minio
open_minio:
	open http://localhost:9001

.PHONY: work
work:
	docker-compose exec app bash

.PHONY: db
db:
	docker-compose exec db bash

.PHONY: mysql
mysql:
	docker-compose exec db bash -c 'mysql -u root -p$$MYSQL_ROOT_PASSWORD $$MYSQL_DATABASE'

.PHONY: redis
redis:
	docker-compose exec redis redis-cli

.PHONY: npm-run
npm-run:
	docker exec -it $(project)_app npm run dev

.PHONY: lint
lint:
	docker exec -it $(project)_app npm run lint

.PHONY: format
format:
	docker exec -it $(project)_app npm run format

# schemaspy実行コマンド
.PHONY: ss-run
ss-run:
	docker-compose run --rm schemaspy

# 新規にlaravelプロジェクトを生成するコマンド
.PHONY: new-project
new-project:
	@make create-laravel
	@make mv-dir
	@make remove-temporary

.PHONY: create-laravel
create-laravel:
	docker-compose exec app composer create-project "laravel/laravel=9.*" temporary --prefer-dist

.PHONY: mv-dir
mv-dir:
	cd server/temporary; mv * .[^\.]* ../

.PHONY: remove-temporary
remove-temporary:
	rm -r server/temporary

redis:
	docker-compose exec redis redis-cli