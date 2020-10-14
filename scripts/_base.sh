# Get dir of current file
SCRIPT_PATH="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Set the root dir
ROOT_PATH="$(realpath $SCRIPT_PATH/../)"

# Set the api dir
API_PATH="$(realpath $ROOT_PATH/api)"

# Set the server dir
SERVER_PATH="$(realpath $ROOT_PATH/nginx)"

# Get options and arguments
POSITIONAL=()

while [[ $# -gt 0 ]]
  do
    key="$1"
    case $key in
          -e|--env)
          APP_ENV="$2"
          shift
          shift
        ;;
          *)
          POSITIONAL+=("$1")
          shift
        ;;
    esac
  done

# Restore positional parameters
set -- "${POSITIONAL[@]}"

export APP_ENV=$APP_ENV
