.PHONY: build_c
build_c:
	docker compose build --no-cache --force-rm

.PHONY: build
build:
	docker compose build

.PHONY: up
up:
	docker compose up -d

.PHONY: stop
stop:
	docker compose stop

.PHONY: down
down:
	docker compose down --remove-orphans

.PHONY: frontend
frontend:
	docker compose exec frontend bash

.PHONY: backend
backend:
	docker compose exec php bash

.PHONY: frontend-start
frontend-start:
	cd frontend; yarn dev

# 新規にlaravelプロジェクトを生成するコマンド
.PHONY: new-project
new-project:
	@make create-laravel
	@make mv-dir
	@make remove-temporary

.PHONY: create-laravel
create-laravel:
	docker compose exec php composer create-project "laravel/laravel=9.*" temporary --prefer-dist

.PHONY: mv-dir
mv-dir:
	cd backend/temporary; mv * .[^\.]* ../

.PHONY: remove-temporary
remove-temporary:
	rm -r backend/temporary

.PHONY: composer-install
composer-install:
	docker compose exec php composer install

.PHONY: npm-install
npm-install:
	docker compose exec php npm install

.PHONY: db
db:
	docker-compose exec db bash

.PHONY: mysql
mysql:
	docker-compose exec db bash -c 'mysql -u root -p$$MYSQL_ROOT_PASSWORD $$MYSQL_DATABASE'