#!/bin/bash

# Get dir of current file
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Set the root dir
ROOT="$(realpath $DIR/../)"

# Setup project
docker-compose -f docker-compose.yml -f docker-compose.testing.yml up -d

# Initialize database
docker-compose exec -T api php bin/console doctrine:database:create --if-not-exists

# Initialize migrations
docker-compose exec -T api php bin/console doctrine:schema:update --force

# Execute tests
docker-compose exec -T api ./vendor/bin/simple-phpunit

API_STATUS=$?

# Terminate project
docker-compose stop

if [ $API_STATUS -gt 0 ]
  then
    printf "\n\033[0;31mTests failed\n\n"
  else
    printf "\n\033[0;32mTests succeed\033[0m\n\n"
fi

exit $API_STATUS