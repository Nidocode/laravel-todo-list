<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

# web.php is the file where you define routes for your web application

// Route::get('/', function () {
//     return view('ToDolist'); 
// }); -> u don't need it since showTasks() does return the ToDolist view with $tasks along



Route::post('addTask', [Taskcontroller::class, 'addTask'])->name('add.attempt'); # When the login form is submitted (with method="POST"), it calls the addTask() method in TaskController.

Route::post('deleteTask', [Taskcontroller::class, 'deleteTask'])->name('delete.attempt');

Route::post('completeTask', [Taskcontroller::class, 'completeTask'])->name('complete.attempt');

Route::put('editTask', [Taskcontroller::class, 'editTask'])->name('edit.attempt');

Route::get('/', [TaskController::class, 'showTasks']); # '/' so it's called with the root URL along with ToDolist view














/*
GET — Retrieve or view data/pages

POST — Create new data (e.g., add a task)

PUT — Update existing data (e.g., edit a task)

DELETE — Delete data (sometimes also done via POST for simplicity)
*/