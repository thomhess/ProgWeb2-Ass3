
This site require laravel 5.4 installed to run.

In the file "env" it is necesarry to change DB_DATABASE=, DB_USERNAME=, DB_PASSWORD=, DB_SOCKET=, in order to make connection with your database. 

To get content to view it is necesarry to run the command:  "php artisan migrate --seed".

This will fill the database with some "dummy data" from the file PostTableSeeder.php

	