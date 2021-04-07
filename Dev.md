## Laravel-inertia-vue

### Installation

```
# Install Laravel
$ composer create-project laravel/laravel laravel-inertia-vue
$ cd laravel-inertia-vue/
$ php artisan serve

# Install Inertia (server-side)
$ composer require inertiajs/inertia-laravel

# Install Inertia (client-side)
$ npm install @inertiajs/inertia @inertiajs/inertia-vue
```

### Server-side setup

Root template:

* Create root template at `resources/views/app.blade.php` with the content:

```html
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body>
    @inertia
  </body>
</html>
```

Middleware:

* Run the command to create `HandleInertiaRequests` middleware. File will be created at `App\Http\Middleware`.
```
$ php artisan inertia:middleware
Middleware created successfully.
```

* Add this middleware at `App\Http\Kernel`, as the last item in your web middleware group
```php
'web' => [
    // ...
    \App\Http\Middleware\HandleInertiaRequests::class,
],
```

Creating response:

TODO:
Create controller:
$ php artisan make:controller EventController --resource

Create Routes:
Add route setting at `app/routes/web.php`:
```php
Route::resource('events', EventController::class);
```

Check route setting:
```bash
$ php artisan route:list
+--------+-----------+---------------------+----------------+----------------------------------------------+------------+
| Domain | Method    | URI                 | Name           | Action                                       | Middleware |
+--------+-----------+---------------------+----------------+----------------------------------------------+------------+
|        | GET|HEAD  | /                   |                | Closure                                      | web        |
|        | GET|HEAD  | api/user            |                | Closure                                      | api        |
|        |           |                     |                |                                              | auth:api   |
|        | GET|HEAD  | events              | events.index   | App\Http\Controllers\EventController@index   | web        |
|        | POST      | events              | events.store   | App\Http\Controllers\EventController@store   | web        |
|        | GET|HEAD  | events/create       | events.create  | App\Http\Controllers\EventController@create  | web        |
|        | GET|HEAD  | events/{event}      | events.show    | App\Http\Controllers\EventController@show    | web        |
|        | PUT|PATCH | events/{event}      | events.update  | App\Http\Controllers\EventController@update  | web        |
|        | DELETE    | events/{event}      | events.destroy | App\Http\Controllers\EventController@destroy | web        |
|        | GET|HEAD  | events/{event}/edit | events.edit    | App\Http\Controllers\EventController@edit    | web        |
+--------+-----------+---------------------+----------------+----------------------------------------------+------------+
```

brew services start mysql@5.6
brew services stop mysql@5.6

Create model
$ php artisan make:model Event

Create migration script
$ php artisan make:migration create_events_table

Run migration script
$ php artisan migrate

Note:
New migration will be placed in your `database/migrations` directory.

Create factory
$ php artisan make:factory EventFactory

Manually create `Dummies` directory.
Create Dummy seeder (dummies/EventSeeder.php) and call the EventFactory.
File: `database/seeders/dummies/EventSeeder.php`

Run seeder to populate dummy data (must specify the class)
$ php artisan db:seed --class=\\Database\\Seeders\\Dummies\\EventSeeder

Note:
Since this is at dummy directory, it will not execute when:
```
$ php artisan db:seed
```




### Client-side setup

Pre-requisite (install vue)
$ composer require laravel/ui
$ php artisan ui vue
$ npm install && npm run dev

Initial dependencies:
$ npm install @inertiajs/inertia @inertiajs/inertia-vue

Initial app:
$ npm install @babel/plugin-syntax-dynamic-import

Create .babelrc.
Edit `resources/js/app.js`, initial vue and use `import`.

Edit `webpack.mix.js`:
```
.webpackConfig({
  output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
})
```


### Persistent Layout

Install `tightenco/ziggy`:
```
$ composer require tightenco/ziggy
```

Add `resources/js/app.js`
```
Vue.prototype.$route = route
```

Add `resources/views/app.blade.php`:

```
@routes
```

Create `resources/js/Layout.vue`


===
$ php artisan make:migration add_user_id_events_table
# You need to truncate events table before execute the migration script, because foreign key (user_id) is not nullable.
$ php artisan migrate


# About Factory and Seeder
Seeder: Use to insert data into DB. Ex: insert 10 records.
Factory: An instruction on what to insert for a particular model. Ex: insert data with faker value.

Call seeder class to insert data as follows:
$ php artisan db:seed --class=\\Database\\Seeders\\Dummies\\UserSeeder

Refs: 
https://appdividend.com/2019/03/11/laravel-model-factories-tutorial-with-example/
https://laravel-news.com/learn-to-use-model-factories-in-laravel-5-1

==
Dropdown
$ npm i popper.js

===
feature/auth:
OK - login
OK - logout
OK - forgot password
OK - reset password (enter new password)

No redirect after enter forgot password email.
- OK fixed. Remain at current page. Add display message and reset form input.

No reset sucess after password has reset and redirect to login page.
- OK Fixed. Redirect to login page. Add display message (reset success) at login page.

OK - register
OK - dashboard (after logged in)

Create middleware:
a. can access if user is login (dashboard, create event, list event).
- OK fixed.

b. can access if user is the owner or current logged in user is an admin (edit, delete event).
- OK fixed.
$ php artisan make:middleware EventOwner

c. can access if user is the admin (edit, delete event)


- update profile
  - /mypage/profile
- event belongs to user
  OK - create event
  OK - edit event
- Create my event list
  OK - /mypage/events
- Update event list to public.
  - OK.
- Footer.
- page auth

optional:
- two factor
- team

useful package for Laravel:
https://www.youtube.com/watch?v=UORMYT8Fs9Y

$ composer require barryvdh/laravel-debugbar --dev

- barryvdh / laravel-ide-helper
           / laravel-debug-bar
- beyondcode / laravel-query-detector           


# mailhog:
$ brew install mailhog
$ brew services start mailhog

$ vi .env
```
MAIL_MAILER=smtp
MAIL_HOST=0.0.0.0
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=admin@local.com
MAIL_FROM_NAME="${APP_NAME}"
```
$ php artisan config:cache

# Check mail:
http://0.0.0.0:8025/

Refs:
https://medium.com/@viraljetani/laravel-quickly-send-or-test-emails-while-on-localhost-using-mailhog-and-tinker-viral-jetani-c174662c4a71



$ composer require laravel/jetstream
$ php artisan jetstream:install inertia --teams

npm install && npm run dev
php artisan migrate

# Remove tailwindcss, autoprefixer, postcss-import
npm uninstall @tailwindcss/forms
npm uninstall @tailwindcss/typography
npm uninstall autoprefixer
npm uninstall postcss-import
npm uninstall tailwindcss
npm install && npm run dev





=========================================
Create Request class

$ php artisan make:request EventCreateRequest

Create Service class

Create Repository class

Fail to create event if time is overlapping.

Pagination

Unit testing

Feature testing


TODO:
Vue:
[OK]- detail page
- edit page
- delete page
- breadcrumb
- edit form bind data (daet_time)

JQuery:

$ npm install jquery-ui --save-dev

$ vi resources/assets/js/app.js
```
// JQuery and its plugins
global.$ = global.jQuery  = require('jquery');
global.datepicker         = require('jquery-ui/ui/widgets/datepicker');
```

$ vi webpack.mix.js
```
mix.autoload({
  jquery: ['$', 'window.$', 'jQuery', 'window.jQuery']
});
```

$ vi resources/views/app.blade.php
```
  <script type="text/javascript">
    window.addEventListener('load', function() {
      $('.datepicker').datepicker({  
         format: 'yyyy-mm-dd'
       });
    });
  </script>
```

$ vi resources/sass/app.scss
```
// JQuery ui
@import '~jquery-ui/themes/base/all.css';
```

$ vi resources/js/Pages/Events/Create.vue
```
    mounted() {
      var self = this;
      $('.datepicker').datepicker({
        onSelect:function(selectedDate, datePicker) {
            self.form.date = selectedDate;
        }, 
        dateFormat: 'yy-mm-dd'
      });
    },
```    

vue-meta:
$ npm install vue-meta --save


https://medium.com/@nedsoft/how-to-add-jquery-ui-plugin-to-a-laravel-app-using-laravel-mix-e85bf0244fc1
https://medium.com/@onwuka_gideon/fixing-laravel-jquery-is-not-defined-a316fd918e0a
https://laravel-mix.com/docs/5.0/jquery-ui

Alter table:
$ composer require doctrine/dbal
$ php artisan make:migration drop_date_time_add_date_events_table
$ php artisan migrate
$ php artisan db:seed --class=\\Database\\Seeders\\Dummies\\EventSeeder


Upgrade Vue 2 to 3:
npm install --save vue@next vue-loader@next
npm install @inertiajs/inertia @inertiajs/inertia-vue3
npm uninstall @inertiajs/inertia-vue

# stop npm run watch and execute the following command, then run watch again
$ npm install @vue/compiler-sfc --save-dev --legacy-peer-deps
$ npm run watch




Vue.js
- Breadcrumbs

Laravel:
[OK]- Service container (ioc)
- Service provider
[OK]- Service class
- typed hint parameter
- Class Aliases
- Facade
- Eloquent findorfail
- Exception

OOP
- abstract class

scope
- protected
- static

Class Database\Seeders\Dummies\EventSeeder located in ./database/seeders/dummies/EventSeeder.php does not comply with psr-4 autoloading standard. Skipping.






























