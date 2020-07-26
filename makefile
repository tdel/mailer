up:
	docker-compose up -d

down:
	docker-compose down

reload:
	down compose

clean:
	docker system prune -a -f

create-db:
	docker-compose exec app sh -c 'php bin/console doctrine:database:create'

generate-db:
	docker-compose exec app sh -c 'php bin/console doctrine:schema:update --force'
