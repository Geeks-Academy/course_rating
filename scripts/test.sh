#!/bin/bash

docker-compose -f docker-compose.yml -f docker-compose.development.yml up -d

docker-compose exec api php bin/phpunit

API_STATUS=$?

docker-compose stop

if [ $API_STATUS -gt 0 ]
then
  printf "\n\033[0;31mTests failed\n\n"
else
  printf "\n\033[0;32mTests succeed\033[0m\n\n"
fi

exit $API_STATUS