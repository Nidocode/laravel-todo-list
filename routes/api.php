<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::post('addTask', [TaskController::class, 'addTask']);
Route::post('deleteTask', [TaskController::class, 'deleteTask']);
Route::post('completeTask', [TaskController::class, 'completeTask']);
Route::put('editTask', [TaskController::class, 'editTask']);

# format:  Route:: HTTP_Method'('URL/path', [YourController::class, 'method in the controller']);


/*
api.php is used for building APIs (endpoints) that return 
JSON data,lik javascript forntend(react), mobile app, and external backend services
*/

# these routes in api.php are meant for API clients, not browser view

/*
::class is a PHP constant that gives you the full class name as a string
[TaskController::class, 'addTask'] == ['App\Http\Controllers\TaskController', 'addTask']
*/

