<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //get
    {
        $currentUser = Auth::user();
        $myTasks = Task::with('creator')->where('created_by', $currentUser->id)->paginate(10);
        return view('tasksview', compact('myTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //get

    {
        $userData = User::all();
        return view('form', compact('userData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request) //post
    {
        $authUser = Auth::user();
        $task = new Task();
        $task->name = $request->input('task_name');
        $task->description = $request->input('task_description');
        $task->start_date = $request->input('task_start_date');
        $task->created_by = $authUser->id;
        // $task->created_by = $request->input('task_created_by');

        $task->task_done = $request->input('task_done');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //get
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('editform', compact('task', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //get
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id) //put/patch
    {
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->input('task_name'),
            'description' =>  $request->input('task_description'),
            'end_date' =>  $request->input('task_end_date'),
            'task_done' => $request->input('task_done') === '1',
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //delete
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return  redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function viewDetails($id)
    {
        $task = Task::with('creator')->findOrFail($id);
        return view('taskdetails', compact('task'));
    }
}
