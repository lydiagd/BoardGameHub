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

Route::get('/l', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('game.index');
});

// Route::get('/', 'App\Http\Controllers\GameController@index')->name('gamePage.index');
