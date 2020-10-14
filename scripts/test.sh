# Include base
source $(dirname $0)/_base.sh

cd $ROOT_PATH

# Start container
docker-compose -f docker-compose.yml -f docker-compose.$APP_ENV.yml up -d

# Initialize database
docker-compose exec -T api php bin/console doctrine:database:create --if-not-exists

# Initialize migrations
docker-compose exec -T api php bin/console doctrine:schema:update --force

# Execute tests
docker-compose exec -T api ./vendor/bin/simple-phpunit

TEST_STATUS=$?

docker-compose stop

if [ $TEST_STATUS -gt 0 ]
  then
    printf "\n\033[0;31mTests failed\n\n"
  else
    printf "\n\033[0;32mTests succeed\033[0m\n\n"
fi

exit $TEST_STATUS