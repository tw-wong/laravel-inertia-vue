# Laravel-Inertia-Vue

A demo CRUD application built using Laravel, Inertia and Vue.js.

## Prerequisite

Install PHP, Composer, Node (v12.20.1), MySQL (5.6), Mailhog

```sh
# NVM
~ brew install nvm
~ nvm install 12.20
~ nvm use v12.20.1

~ node -v
v12.20.1


# MySQL
~ brew install mysql@5.6
~ brew services start mysql@5.6

# Mailhog
~ brew install mailhog
~ brew services start mailhog
```

*Refs:*

- NVM: https://jamesauble.medium.com/install-nvm-on-mac-with-brew-adb921fb92cc

- Mailhog: https://medium.com/@viraljetani/laravel-quickly-send-or-test-emails-while-on-localhost-using-mailhog-and-tinker-viral-jetani-c174662c4a71

## Installation

Clone the repo locally:

```sh
~ git clone git@github.com:tw-wong/laravel-inertia-vue.git
~ cd laravel-inertia-vue
```

Install PHP dependencies:

```sh
~ composer install
```

Install NPM dependencies:

```sh
~ npm install
```

Build assets:

```sh
~ npm run dev
```

Setup configuration:

```sh
~ cp .env.example .env
```

Database configuration: 

```
~ cat .env | grep DB_
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_inertia_vue
DB_USERNAME=root
DB_PASSWORD=
```

*Note:*

- Default database name is `laravel_inertia_vue`. 

- Default database username is `root` and password is blank (empty).

- When creating database, please select `UTF-8 Unicode (utf8mb4)` as encoding method.

- When creating database, please select `utf8_general_ci` as collation method.

- Please update the config accordingly.


Generate application key:

```sh
~ php artisan key:generate
```

Run database migrations:

```sh
~ php artisan migrate
```

Run database seeder:

```sh
~ php artisan db:seed --class=\\Database\\Seeders\\Dummies\\UserSeeder
```

Run the dev server (the output will give the address):

```sh
~ php artisan serve
```

You're ready to go! Visit demo application in your browser, and login with:

- **Username:** johndoe@example.com
- **Password:** password

## Running tests

To run the tests, run:

```
~ phpunit
```