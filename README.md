# Laravel-Inertia-Vue

A demo CRUD application built using Laravel, Inertia and Vue.js.

## Installation

Clone the repo locally:

```sh
git clone git@github.com:tw-wong/laravel-inertia-vue.git
cd laravel-inertia-vue
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Generate application key:

```sh
php artisan key:generate
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed --class=\\Database\\Seeders\\Dummies\\UserSeeder
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit demo application in your browser, and login with:

- **Username:** johndoe@example.com
- **Password:** password

## Running tests

To run the tests, run:

```
phpunit
```