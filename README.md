### How to run a project
1. Clone repository
2. cd into your project
3. Run ```composer install``` and ```npm install```
4. Create a copy of .env.example file by running ```cp .env.example .env```
5. To generate app encryption, run ```php artisan key:generate```
6. Create an empty database
7. In the .env file edit the DB_DATABASE, DB_USERNAME, and DB_PASSWORD fields
8. Migrate your database: ```php artisan migrate```
9. ```php artisan serve``` to run a project
