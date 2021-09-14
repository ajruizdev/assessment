# My Theresa Assessment

# Building de environment

Execute the file build.sh which will create the docker containers and will run some necessary commands in order to initialize de database and load test data

If it fails on the first run, try running it again as the script does not check for database container health status and may fail when trying to connect

> ./build.sh

If everything is ok the server will listen on port 80 so type
> http://localhost

and it will be redirected to the api doc on 
> http://localhost/api/doc

# Running the tests

> docker-compose -f ./build/docker-compose.yml run --rm php bin/phpunit

or

> cd build && docker-compose run --rm php bin/phpunit
