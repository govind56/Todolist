# Todolist
Task Manager

ToDo List  - Laravel 7


Installation Steps
Clone the repo

https://github.com/govind56/Todolist.git
Run composer install

composer install
Create .env

cp .env.example .env
Generate APP_KEY

php artisan key:generate
Configure MySQL connection details in .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={database name}
DB_USERNAME={database user}
DB_PASSWORD={database password}
Run database migrations and seeders

php artisan migrate
php artisan db:seed
Running the application
Run the application in a Virtual Host

Comes with couples of default users and their tasks
User credentials are as follows

Email: govind@gmail.com | Password: (1qaz!QAZ)
