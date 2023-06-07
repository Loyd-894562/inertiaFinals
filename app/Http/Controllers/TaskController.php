<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $tasks = Task::orderBy('title')->where('user_id',$user->id)
            ->with('user')
            ->get();
            
        $users = User::orderBy('name')->get();

        return inertia('tasks/index', [
            'tasks' => $tasks,
            'users' => $users
        ]);
    }

    public function create() {
        return inertia('tasks/create', [
            'tasks' =>Task::orderBy('title')->with('user')->get(),
            'users' =>User::orderBy('name')->get()
        ]);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'title'=>'string|required',
            'description'=>'string|required',
            'due_date'=>'date|required',
            'status'=>'string|required',
        ]);
        
       $task = new Task([
            'title' => $fields['title'],
            'description' => $fields['description'],
            'user_id' => Auth::user()->id,
            'due_date' =>$fields['due_date'],
            'status'  =>$fields['status']
        ]);
        $task->save();
        

        return redirect('/tasks');
    }

    public function edit(Task $task) {
        return inertia('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task){
        $fields = $request->validate([
            'title'=>'string|required',
            'description'=>'string|required',
            'due_date'=>'date|required',
            'status'=>'string|required',
        ]);
        
      
        $task->update($fields);
        

        return redirect('/tasks');
    }


    public function destroy(Task $task){

        $task->delete();

        return redirect('/tasks')->with('message', 'Task Deleted Successfully');
    }
}
