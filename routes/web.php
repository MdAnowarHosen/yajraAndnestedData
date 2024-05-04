<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('users', 'getUsers')->name('get.users');
});

Route::controller(UserController::class)->group(function(){
    Route::get('edit/user/{user}', 'edit')->name('edit.user');
    Route::post('edit/user/{user}', 'update')->name('update.user');
    Route::delete('delete/user/{user}', 'destroy')->name('destroy.user');
});

Route::controller(CategoriesController::class)->prefix('categories')->name('categories.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('users', 'getCategories')->name('get.categories');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('all', 'all')->name('all');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
