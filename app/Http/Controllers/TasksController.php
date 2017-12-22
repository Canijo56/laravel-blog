<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
//namespaace!!

class TasksController extends Controller
{
    public function index()
    {

	    // direct DB call
		//$tasks = DB::table('tasks')->get();

	    // Model Method
	    $tasks = Task::all();

	    return view('tasks.tasks_database_data_test', compact('tasks'));
    }

    public function show(Task $task)
	    {	    	
	    // direct DB call
		//$task = DB::table('tasks')->find($id);

	    // Model Method
	    //$task = Task::find($task);

	    //now Task $task understands wildcard {task} and matches name to Model (model binding) so it automatically performs Task::find(wildcard)
	    	//carefull, it needs PRIMARY KEY on model table 

	    return view('tasks.show',compact('task'));
    }
}
