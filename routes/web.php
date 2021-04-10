<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\URL;

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('game.index');
})->name('main');

// Route::get('/games', 'App\Http\Controllers\GameController@index')->name('gamePage.index');
Route::get('/about', function () {
    return view('game.about');
})->name('about');

Route::get('/register', 'App\Http\Controllers\RegistrationController@index')->name('registration.index');
Route::post('/register', 'App\Http\Controllers\RegistrationController@register')->name('registration.create');
Route::get('/login', 'App\Http\Controllers\AuthController@loginForm')->name('auth.loginForm');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');