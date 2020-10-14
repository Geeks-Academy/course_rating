# Include base
source $(dirname $0)/_base.sh

cd $ROOT_PATH

# Start container
docker-compose -f docker-compose.yml -f docker-compose.$APP_ENV.yml up -d
