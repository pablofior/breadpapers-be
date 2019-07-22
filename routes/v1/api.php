<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {

    Route::prefix('user')
        ->name('user.')
        ->group(function() {
            Route::get('/get-logged', 'UserController@getLoggedUser')->name('get');
            Route::get('/all', 'UserController@all')->name('all');
            Route::post('/store', "UserController@store")->name('store');
            Route::post('/update/{id}', 'UserController@update')->name('update');
            Route::delete('/delete/{id}', 'UserController@delete')->name('delete');
        });

    Route::prefix('breadpaper')
        ->name('breadpaper.')
        ->group(function() {
            Route::post('/store', 'BreadpaperController@store')->name('store');
            Route::post('/update', 'BreadpaperController@update')->name('update');
            Route::post('/sync-collaborators', 'BreadpaperController@syncCollaborators')->name('sync');
            Route::get('/get-owned/{userId}', 'BreadpaperController@getOwned')->name('owned');
            Route::get('/get-collaborating/{userId}', 'BreadpaperController@getCollaborating')->name('collaborating');
        });

});
