explorer
========

Simple project to use tree and find best practice in this context.

## Install project

> composer install

> yarn


### Set the database

> php bin/console doctrine:schema:create

### Set data

> php bin/console doctrine:migrations:migrate  

## Start the project

### Build front dependencies

> yarn assets:build

### Start the php application

> yarn start