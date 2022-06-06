
## Laravel 9 Confluence  Transport Application

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
cd laravel-9-TRANSPORT_APP
cp .env.example .env
composer Update
composer install
php artisan key:generate
composer require intervention/image 
php artisan cache:clear && php artisan config:clear

npm install 
npm run dev 
npm run watch 

```
## Before starting <br>
Create a database <br>
```
mysql
create database TRANSPORT_APP;
exit;
```
Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=TRANSPORT_APP
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```
Migrate the tables
```
php artisan migrate
```
## for  run the server <br>
```
php artisan serve
```