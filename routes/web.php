<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MyPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'laravelVersion'    => Application::VERSION,
        'phpVersion'        => PHP_VERSION,
    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

// Route::resource('events', EventController::class);

Route::middleware(['auth:sanctum', 'verified', 'event.owner'])->group(function () {
    // login is required
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
        
    Route::post(
        '/events', [EventController::class, 'store']
    )->name('events.store');
    
    Route::get(
        '/events/create', [EventController::class, 'create']
    )->name('events.create');
    
    Route::delete(
        '/events/{event_id}', [EventController::class, 'destroy']
    )->name('events.destroy');
    
    Route::put(
        '/events/{event_id}', [EventController::class, 'update']
    )->name('events.update');
    
    Route::get(
        '/events/{event_id}/edit', [EventController::class, 'edit']
    )->name('events.edit');
    
    Route::get(
        '/mypage/events', [MyPageController::class, 'events']
    )->name('mypage.events');
        
    // login is not required
    Route::get(
        '/events', [EventController::class, 'index']
    )->withoutMiddleware(['auth:sanctum', 'verified', 'event.owner'])->name('events.index');
    
    Route::get(
        '/events/{event_id}', [EventController::class, 'show']
    )->withoutMiddleware(['auth:sanctum', 'verified', 'event.owner'])->name('events.show');
});