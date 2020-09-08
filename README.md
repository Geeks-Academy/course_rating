## Quick startup

### For docker (linux)

- Build image using
```
docker build . --tag course_rating:0.1 --build-arg USER_ID=$(id -u)
```

- Download dependencies
```
docker run -it -v $PWD:/var/www course_rating:0.1 "composer install"
```

- Start development server (on port 8080 in detached mode)
```
docker run -it -d --publish 8080:8080 --name=course_dev -v $PWD:/var/www course_rating:0.1 "php -S 0.0.0.0:8080 -t public"
```
> Website will be available on `localhost:8080` (host).

- Access container environment
```
docker exec -it course_dev /bin/bash
```

> If you want to stop the server, type
> `docker stop course_dev` on your host machine.
> After that, you can re-run your server using `docker start course_dev`
