#!/bin/bash

# Get dir of current file
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Set the root dir
ROOT="$(realpath $DIR/../)"

# Set the api dir
API="$(realpath $ROOT/api)"

# Get the app env variable
APP_ENV=$1

# Go to the root directory
cd $ROOT;

# Create configuration files
if [ -f "$ROOT/.env" ]
  then
    echo "Configuration exists, skipping."
  else
    cp $ROOT/.env.$1.example $ROOT/.env
fi

if [ -f "$API/.env" ]
  then
    echo "Configuration exists, skipping."
  else
    cp $API/.env.$1 $API/.env
fi

declare -A environments=(
  ["test"]="testing"
  ["dev"]="development"
)

# Build project
docker-compose -f docker-compose.yml -f docker-compose.${environments[$APP_ENV]}.yml build

BUILD_STATUS=$?

if [ $BUILD_STATUS -gt 0 ]; then
  printf "\n\033[0;31mBuild failed\n\n"

  exit $BUILD_STATUS
fi

# Initialize container dependencies
docker-compose -f docker-compose.yml -f docker-compose.${environments[$APP_ENV]}.yml up -d

docker-compose stop

exit 0