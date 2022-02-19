
# ToDo List

Basic todo list, that allows users to register, log in, and create tasks that are saved against their account. It includes the dynamic burndown chart, that displays the number of tasks that were not yet completed at each minute in the last hour.

## Installation Steps

Clone the repo

```bash
  https://github.com/govind56/Todolist.git
```

Run composer install

```bash
  composer install
      or
  composer update
      or
  composer install --ignore-platform-reqs
```

Create .env

```bash
  cp .env.example .env
```

Generate APP_KEY

```bash
  php artisan key:generate
```

Configure MySQL connection details in .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={database name}
DB_USERNAME={database user}
DB_PASSWORD={database password}
```

Run database migrations and seeders

```bash
php artisan migrate
php artisan db:seed
```


Run database migrations and seeders

```bash
php artisan migrate
php artisan db:seed
```

## Running the application

Run application locally

```bash
  http://127.0.0.1:8000/todo
```

Login Credentials

```bash
  Email: govind@gmail.com | Password: (1qaz!QAZ)
```
