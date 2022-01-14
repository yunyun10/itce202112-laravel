<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::where('is_completed', 0)->paginate(10);
        return view('tasks',['tasks' => $tasks]);
    }
    public function create(Request $request) {
        $create_tasks = Task::create([
            'name' => $request->name,
            'deadline' => $request->deadline
        ]);
        $create_tasks->save();

        return redirect('/');
    }
    public function complete(Request $request)
    {
        $completed_tasks = Task::where('id', $request->id)->update([
            'is_completed' => 1
        ]);

        return redirect('/');
    }

    public function uncomplete(Request $request)
    {
        $uncomplete_tasks = Task::where('id', $request->id)->update([
            'is_completed' => 0
        ]);

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $delete_tasks = Task::where('id', $request->id)->delete();

        return redirect('/');
    }


    public function update(Request $request) {
        $update_tasks = Task::where('id', $request->id)->update([
            'name' => $request->name,
            'deadline' => $request->deadline
        ]);

        return redirect('/tasks');
    }
}
