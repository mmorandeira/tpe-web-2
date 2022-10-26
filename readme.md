# TPE Web 2: Gestion de gastos

<!--- TBC --->

Para crear la base de datos y las tablas correr:

```bash
docker-compose up --build -d
docker exec -i tpe-web2-db mysql < ./db/create-schema.sql
docker exec -i tpe-web2-db mysql < ./db/hydrate-tables.sql
docker exec -i tpe-web2-php-server sh -c "cd /usr/share/nginx/html/app && composer install"
```
