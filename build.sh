#!/bin/bash

echo "========================================"
echo "=       Creating environment           ="
echo "========================================"
docker-compose -f ./build/docker-compose.yml up -d --build

echo "========================================"
echo "=    Installing project dependencies   ="
echo "========================================"
docker-compose -f ./build/docker-compose.yml run --rm  php composer install

echo "========================================"
echo "=          Create  database            ="
echo "========================================"
docker-compose -f ./build/docker-compose.yml run --rm php bin/console doctrine:database:create

echo "========================================"
echo "=      Updating database schema        ="
echo "========================================"
docker-compose -f ./build/docker-compose.yml run --rm php bin/console --no-interaction doctrine:migrations:migrate

echo "========================================"
echo "=           Load Fixtures              ="
echo "========================================"
docker-compose -f ./build/docker-compose.yml run --rm php bin/console --no-interaction doctrine:fixtures:load
