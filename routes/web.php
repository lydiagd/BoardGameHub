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

// Route::get('/laravel', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('game.index');
})->name('main');

Route::get('/games', 'App\Http\Controllers\GameController@index')->name('games');
Route::get('/games/{id}', 'App\Http\Controllers\GameController@show')->name('games.show');

Route::get('/games/userfavorites', 'App\Http\Controllers\FavoriteController@userFavorites')->name('allfavorites');


Route::post('/games/search', 'App\Http\Controllers\GameController@search')->name('games.search');



Route::get('/about', function () {
    return view('game.about');
})->name('about');

Route::middleware(['custom-auth2'])->group(function () {
    Route::get('/register', 'App\Http\Controllers\RegistrationController@index')->name('registration.index');
    Route::post('/register', 'App\Http\Controllers\RegistrationController@register')->name('registration.create');
    Route::get('/login', 'App\Http\Controllers\AuthController@loginForm')->name('auth.loginForm');
    Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
});

Route::middleware(['custom-auth'])->group(function () {
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
    Route::get('/profile/mygames', 'App\Http\Controllers\ProfileController@mygames')->name('profile.mygames');
    Route::get('/profile/mygames/delete/{id}', 'App\Http\Controllers\ProfileController@deleteGame')->name('profile.deleteGame');
    Route::post('/profile/mygames/delete/{id}', 'App\Http\Controllers\ProfileController@deleted')->name('profile.deleted');
    

    Route::get('/profile/favorites', 'App\Http\Controllers\FavoriteController@index')->name('profile.favorites');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

    Route::get('/games/newgame/create', 'App\Http\Controllers\GameController@create')->name('games.create');
    Route::post('/games', 'App\Http\Controllers\GameController@store')->name('games.store');

    Route::get('/games/edit/{id}', 'App\Http\Controllers\GameController@edit')->name('games.edit');
    Route::post('/games/edit/{id}', 'App\Http\Controllers\GameController@update')->name('games.update');

    
    Route::get('/games/{id}/review', 'App\Http\Controllers\ReviewController@create')->name('review.create');
    Route::post('/games/{id}', 'App\Http\Controllers\ReviewController@store')->name('review.store');
    Route::get('/games/review/{id}/edit', 'App\Http\Controllers\ReviewController@edit')->name('review.edit');
    Route::post('/games/review/{id}/update', 'App\Http\Controllers\ReviewController@update')->name('review.update');
    
    Route::get('/games/review/{id}/delete', 'App\Http\Controllers\ReviewController@removeForm')->name('review.removeForm');
    Route::post('/games/review/{id}/delete', 'App\Http\Controllers\ReviewController@remove')->name('review.remove');
    


    Route::post('/games/favorite/{id}', 'App\Http\Controllers\FavoriteController@add')->name('favorite.add');

    Route::get('/games/favorite/{id}/remove', 'App\Http\Controllers\FavoriteController@removeForm')->name('favorite.removeForm');
    Route::post('/games/favorite/{id}/remove', 'App\Http\Controllers\FavoriteController@remove')->name('favorite.remove');
  
    
});

