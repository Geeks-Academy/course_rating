## Quick startup

### For docker (linux)

Allows you to quick setup development environment

- Setup host configuration
    - First, you have to create `.env` file from `.env.example`
    - Configure `.env` variables
        ```
        ###> docker/dev ###
        # Set your user id here (if linux/mac), otherwise, leave it as it is here
        USER_ID=1000
      
        # Set a port where the app should be served on your localhost
        APP_PORT=8080
      
        # Set a port where the database should be served on your localhost
        DB_PORT=3310
        ###< docker/dev ###
        ```
      
- Build images using
    ```
    docker-compose -f docker-compose.yml -f docker-compose.development.yml build
    ```
  
- Download dependencies using
    ```
    docker-compose -f docker-compose.yml -f docker-compose.development.yml run --no-deps api /bin/bash -c "composer install"
    ```

- Start development server
    ```
    docker-compose -f docker-compose.yml -f docker-compose.development.yml up -d
    ```
    > Website will be available on `localhost:APP_PORT` (host).

- Access container environment
    - If it's running
      ```
      docker-compose exec api /bin/bash
      ```
      
    - If it's not running (without database access)
      ```
      docker-compose -f docker-compose.yml -f docker-compose.development.yml run --no-deps api /bin/bash
      ```
      
    > If you want to stop the server, type
      `docker-compose stop` on your host machine.

