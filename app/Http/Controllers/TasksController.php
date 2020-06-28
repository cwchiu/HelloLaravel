<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    function list() {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks.tasks', [
            'tasks' => $tasks,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]

        );

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/tasks');
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/tasks');
    }
}
