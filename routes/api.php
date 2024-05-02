<?php

// routes/api.php

use Illuminate\Support\Facades\Route;

Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@store');
Route::get('/users/{id}', 'UserController@show');
// Add more routes as needed