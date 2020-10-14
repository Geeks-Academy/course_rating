#!/bin/bash

# Include base
source $(dirname $0)/_base.sh

declare -A shells=(
  ["api"]="/bin/bash"
)

cd $ROOT_PATH

docker-compose exec "$1" "${shells[$1]}"
