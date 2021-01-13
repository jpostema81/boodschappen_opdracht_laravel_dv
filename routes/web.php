<?php

use Illuminate\Support\Facades\Route;

// R: gebruik ook resource-routes voor minder regels code:
// https://laravel.com/docs/8.x/controllers#resource-controllers
Route::get('/', 'GroceriesController@index')->name('groceries.index');
Route::get('/groceries/create', 'GroceriesController@create')->name('groceries.create');
Route::post('/groceries', 'GroceriesController@store')->name('groceries.store');
Route::get('/groceries/{grocery}/edit', 'GroceriesController@edit')->name('groceries.edit');
Route::put('/groceries/{grocery}', 'GroceriesController@update')->name('groceries.update');
Route::delete('/groceries/{grocery}', 'GroceriesController@destroy')->name('groceries.destroy');
