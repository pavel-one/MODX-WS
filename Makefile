up:
	docker-compose up -d
status:
	docker-compose ps
down:
	docker-compose down
exec:
	docker-compose exec app bash
exec.nginx:
	docker-compose exec nginx bash
exec.db:
	docker-compose exec db bash