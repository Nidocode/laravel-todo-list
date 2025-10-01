<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{

    public function addTask(Request $request) {

        try {
            $validated = $request->validate([
                'task' => 'required|string|max:255',
            ]);
        
            $user = Task::create([  # this creates a new task in the tasks table in the database
                'task' => $validated['task'],
            ]);

            // return response()->json([
            //     'response_code' => 201,
            //     'status'        => 'success',
            //     'message'       => 'task add Successfully',
            // ], 201);

            return redirect('/');

        } catch (ValidationException $e) {
            return response()->json([
                'response_code' => 422,
                'status'        => 'error',
                'message'       => 'Validation failed',
                'errors'        => $e->errors(),
            ], 422);
        }

        
    }

    public function deleteTask(Request $request) {
        $task = Task::where('id', $request->id)->delete();
        // return response()->json([
        //     'response_code' => 200,
        //     'status'        => 'success',
        //     'message'       => 'task deleted Successfully',
        // ], 201);

        return redirect('/');
    }

    public function completeTask(Request $request) {

        $task = Task::find($request->id); 
        
        if ($task) { # If a task was found in the database
            $task->completed = !$task->completed; 
            $task->save();
        }

        // return response()->json([
        //     'response_code' => 200,
        //     'status'        => 'success',
        //     'message'       => 'task completed Successfully',
        // ], 201);

        return redirect('/');
    }


    public function editTask(Request $request) {
        $task = Task::where('id', $request->id)->update(['task' => $request->task]);
        // return response()->json([
        //     'response_code' => 200,
        //     'status'        => 'success',
        //     'message'       => 'task edited Successfully',
        // ], 201);

        return redirect('/');
    } 

    // public function showTasks(){
    // $tasks = Task::all(); # save all the tasks
    // return view('ToDolist', compact('tasks')); # compact('tasks') makes a variable called $tasks available in the view
    // }

    public function showTasks() {
    
    try {
        $tasks = Task::all();

        if ($tasks->isEmpty()) {
            throw new \Exception('No tasks found.');
        }else{
            return view('ToDolist', compact('tasks'));
        }

    } catch (\Exception $e) {
        return view('ToDolist', ['tasks' => collect()])
        ->with('error', $e->getMessage());
    }

    
    }




}
