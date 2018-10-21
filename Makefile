.PHONY: up down clean

.env:
	@cp .env.example .env

up: .env
	docker-compose up --build --force-recreate -d

down:
	docker-compose down

clean:
	docker-compose system prune