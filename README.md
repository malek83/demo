# Demo

## Binary tree algorithm

I've used Nested set model for persisting binary tree in SQL database.

This model is better for environment where read operations are more often then write operations 
(model is optimised for reads).

## Running

### Using included docker containers

To run defined docker containers execute:

```bash
$ chmod +x ./run.sh

$ ./run.sh

$ docker exec -it demo-php bash

root@docker-php $ composer install
```

I've used composer only for autoloading purposes and for including PSR-7 Interfaces 
(no framework used as has been said).

### Using own server

If you don't want to use included docker containers the SQL is located in:

```sql
./docker/mysql/seed-db.sql
```

and domain root must be set for ```./source/public``` directory.

### Test

Just enter http://localhost