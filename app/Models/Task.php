<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks'; 
    protected $fillable = ['task', 'completed']; #  tells Laravel which fields are allowed to be defined when creting a new task
    # it won’t let you create/update database fields unless you add them in $fillable
}

/* 
:شرح مختصر لدور المودل

This defines a model class called Task that represents a row in your database’s tasks table

Task model is key to making Laravel’s Eloquent Object-Relational Mapper (ORM). work with your tasks table
Laravel’s Eloquent ORM: lets you interact with your database tables as if they were PHP objects, instead of writing raw SQL.
*/
























/*

Eloquent features:

| Task              | SQL                                | Eloquent (Laravel)     |
| ----------------- | ---------------------------------- | ---------------------- |
| Select all rows   | `SELECT * FROM tasks`              | `Task::all()`          |
| Find by ID        | `SELECT * FROM tasks WHERE id = 1` | `Task::find(1)`        |
| Insert a new task | `INSERT INTO tasks ...`            | `Task::create([...])`  |
| Update a task     | `UPDATE tasks SET ...`             | `$task->update([...])` |
| Delete a task     | `DELETE FROM tasks WHERE id = ?`   | `$task->delete()`      |


*/