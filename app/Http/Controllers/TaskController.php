<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user() ? $request->user()->tasks : collect();
        return view('tasks.index', compact('tasks'));
    }

    public function show(User $user, Task $task)
    {
        $tasks = $user->tasks;
        return view('tasks.show', compact('task', 'tasks'));
    }

    public function create(Request $request, User $user)
    {
        return view('tasks.create', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'type'=>'required',
            'description'=>'required'
        ]);

        $user->tasks()->create([
           'type' => $request->type,
           'description' => $request->description
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }
}
