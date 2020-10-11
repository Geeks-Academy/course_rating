## Quick startup


### Commitlint configuration:

Install Node.js on your machine [Node via package manager](https://nodejs.org/en/download/package-manager/)

After that in root directory run command in terminal ```npm install``` to install dependencies.

Your commit message should contain PREFIX: RAGC, ID as a number, and SUBJECT.
Example: ```"RAGC-21 - Your commit message"```



### For docker (linux)

Allows you to quick setup development environment

- Setup host configuration
    - First, you have to create `.env` file from `.env.example`
    - Configure `.env` variables
        ```
        ###> docker/dev ###
        # Set a port where the app should be served on your localhost
        APP_PORT=8080

        # Set a port where the database should be served on your localhost
        DB_PORT=3310
        ###< docker/dev ###

        ###> docker/mysql ###
        # Set the database user name
        MYSQL_USER=user

        # Set the database name
        MYSQL_DATABASE=database

        # Set the database user password
        MYSQL_PASSWORD=pass

        # Set the database password for the CLI usage
        MYSQL_ROOT_PASSWORD=pass

        # It should be untouched if its running in docker
        MYSQL_HOST=database:3306
        ###< docker/mysql ###
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



### Frontend version - base setup

- First of all change directory and install dependencies
  ```
  cd admin && npm install
  ```
- To run application
   ```
  npm start
  ```
- To run tests:
    - with watch mode
        ```
        npm run test:watch
        ```
    - w/o watch mode
        ```
        npm test
        ```
    - generete coverve test report
        ```
        npm run test:coverage
        ```
        > **Note:** After command you will see total coverage and will be create coverage directory with UI view -> ```coverage/lcov-report/index.html```

- To run Storybook:
   ```
  npm run storybook
  ```
- To run stylelint manualy:
    ```
    npm run lint:css
    ```
- To run prettier manualy:
    ```
    npx prettier --config .prettierrc --write src/.
    ```
- To run eslint manualy:
    ```
    npx eslint --fix src/.
    ```