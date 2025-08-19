<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
//use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Console\View\Components\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Tasks::with('user')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Tasks $task)
    {
        $tasks = Tasks::with('user')->get();
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
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

    public function edit(Tasks $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, User $user, Tasks $task)
    {
        $request->validate([
            'type'=>'required',
            'description'=>'required',
            'user_id' => 'required'
        ]);

        $task->update([
            'type' => $request->type,
            'description' => $request->description,
            'user_id' => $request->input('user_id')
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Tasks $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function purge($id)
    {
        $task = Tasks::withTrashed()->findOrFail($id);
        $task->forceDelete();
        return redirect()->route('tasks.index')->with('success', 'Task permanently deleted successfully');
    }

    // Just to try if SSH
    // leme see now
    public function report(Request $request){
        $tasksByUser = Tasks::with('user')->get()->groupBy('user_id');

        $html = view('tasks.report', compact('tasksByUser'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        //$pdf = PDF::loadView('tasks.report', ['tasksByUser' => $tasksByUser]);

        return response($mpdf->Output('', 'I'))
            ->header('Content-Type', 'application/pdf');
    }
}
