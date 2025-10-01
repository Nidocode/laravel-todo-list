<?php

use Illuminate\Support\Facades\Route;


# web.php is the file where you define routes for your web application

// Route::get('/', function () {
//     return view('ToDolist'); 
// }); -> u don't need it since showTasks() does return the ToDolist view with $tasks along


use App\Http\Controllers\TaskController;

Route::post('addTask', [TaskController::class, 'addTask'])->name('add.attempt');
Route::post('deleteTask', [TaskController::class, 'deleteTask'])->name('delete.attempt');
Route::post('completeTask', [TaskController::class, 'completeTask'])->name('complete.attempt');
Route::put('editTask', [TaskController::class, 'editTask'])->name('edit.attempt');

Route::get('/', [TaskController::class, 'showTasks']);













/*
GET — Retrieve or view data/pages

POST — Create new data (e.g., add a task)

PUT — Update existing data (e.g., edit a task)

DELETE — Delete data (sometimes also done via POST for simplicity)
*/