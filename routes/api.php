<?php

// routes/api.php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::prefix('students')->group(function () {
  Route::get('/', [StudentsController::class, 'index']); // Get all students
  Route::post('/', [StudentsController::class, 'store']); // Create a new student
  Route::get('/{id}', [StudentsController::class, 'show']); // Get a specific student
  Route::put('/{id}', [StudentsController::class, 'update']); // Update a student
  Route::delete('/{id}', [StudentsController::class, 'destroy']); // Delete a student
});

// Route::get('/users', 'UserController@index');
// Route::post('/users', 'UserController@store');
// Route::get('/users/{id}', 'UserController@show');
// Add more routes as needed