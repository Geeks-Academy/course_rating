#!/bin/bash

# Include base
source $(dirname $0)/_base.sh

# Create configuration
if [ ! -f $ROOT_PATH/.env ]; then
    cp $ROOT_PATH/.env.$APP_ENV.example $ROOT_PATH/.env
  else
    echo "Configuration exists, skipping"
fi

# Create server log path for nginx
if [ ! -f $SERVER_PATH/logs/access.log ]; then
    touch $SERVER_PATH/logs/access.log
fi

if [ ! -f $SERVER_PATH/logs/error.log ]; then
    touch $SERVER_PATH/logs/error.log
fi

cd $ROOT_PATH;

# Download containers
docker-compose -f docker-compose.yml -f docker-compose.$APP_ENV.yml pull

# Build containers
docker-compose -f docker-compose.yml -f docker-compose.$APP_ENV.yml build

# Set status of the build
BUILD_STATUS=$?

if [ $BUILD_STATUS -gt 0 ]; then
    echo "Build failed for the \"${APP_ENV}\" environment." && exit $BUILD_STATUS
fi

# Initialize containers
docker-compose -f docker-compose.yml -f docker-compose.$APP_ENV.yml up -d

# Install composer if run as development
if [ $APP_ENV == 'dev' ]; then
    docker-compose -f docker-compose.yml -f docker-compose.$APP_ENV.yml exec api composer install
fi

# Halt containers
docker-compose stop

exit $BUILD_STATUS;
