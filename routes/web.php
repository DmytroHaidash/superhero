<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('heroes', 'SuperHeroesController');

Route::group([
    'as' => 'media.',
    'prefix' => 'media',
], function () {
    Route::post('upload', 'MediaController@upload')->name('upload');
    Route::delete('{media}', 'MediaController@destroy')->name('destroy');
});
