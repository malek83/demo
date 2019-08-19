#!/usr/bin/env bash

docker stop $(docker ps -qf name=demo-) -t 0

docker rm $(docker ps -aqf name=demo-)

docker-compose build

docker-compose up --force-recreate -d