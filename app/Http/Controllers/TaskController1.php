<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;


class TaskController1 extends Controller
{
    public function create()
    {
        return view('form');
    }
    public function store(TaskRequest $request)
    {
        // Validate the form data
        // $request->validate([
        //     'task-name' => 'required|string|max:255',
        //     'task-description' => 'nullable|string',
        //     'task-start-date' => 'required|date',
        //     'task-created-by' => 'required|string|max:255',
        //     'task_done' =>  'boolean',
        // ]);

        // Create a new task
        $authUser = Auth::user();
        $task = new Task();
        $task->name = $request->input('task_name');
        $task->description = $request->input('task_description');
        $task->start_date = $request->input('task_start_date');
        $task->created_by = $authUser;
        $task->task_done = $request->input('task_done');
        $task->save();

        return redirect()->route('tasks.view')->with('success', 'Task created successfully!');
    }

    public function view()
    {

        $myTasks = Task::paginate(10);
        return view('tasksview', compact('myTasks'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('editform', compact('task'));
    }


    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->input('task_name'),
            'description' =>  $request->input('task_description'),
            'end_date' =>  $request->input('task_end_date'),
            'task_done' => $request->input('task_done') === '1',
        ]);
        return redirect()->route('tasks.view')->with('success', 'Task updated successfully!');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return  redirect()->route('tasks.view')->with('success', 'Task deleted successfully!');
    }
    public function show($id)
    {

        $task = Task::findOrFail($id);
        return view('taskdetails', compact('task'));
    }
}