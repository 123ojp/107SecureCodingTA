docker pull abiosoft/caddy:php
docker pull mysql:5.7
docker pull node:alpine
docker pull php:7.0-apache

for d in ./*/ ;
do
  (cd "$d" ;  docker-compose up -d ; cd ..);
done
