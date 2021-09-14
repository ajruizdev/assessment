# My Theresa Assessment

# Building de environment

Execute the file build.sh which will create the docker containers and will run some necessary commands in order to initialize de database and load test data

If it fails on the first run, try running it again as the script does not check for database container health status and may fail when trying to connect

> ./build.sh

# Running the tests

> docker-compose -f ./build/docker-compose.yml run --rm php bin/console

or

> cd build && docker-compose run --rm php bin/console
