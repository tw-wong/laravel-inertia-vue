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
































