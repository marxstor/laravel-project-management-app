<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        $tasks = Task::all();

        // foreach($tasks as $task) {
        //     echo '<br>' . 'Project Name:' . $task->projects->proj_name . '<br>';
        //     echo 'Task Name:' . $task->task_name . '<br>';
        //     echo 'Created by:' . $task->taskCreator->name . '<br>';
        //     echo 'Assigned to:' . $task->assignedUser->name . '<br>';
        // }

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::with('tasks')->select('id', 'proj_name')->get();

        $users = User::with('user_type')->select('users.id', 'users.name')
                                        ->leftjoin('user_types', 'users.id', '=', 'user_types.user_id')
                                        ->where('user_type', 'MEMBER')
                                        ->get();

        return view('tasks.create', [
                                    'projects' => $projects,
                                    'users' => $users
                                ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'project_id' => 'required',
            'task_name' => 'required',
            'task_deadline' => 'required|date',
            'assigned_user' => 'required',
        ]);
        
        $created_by = auth()->user()->id;


        Task::create([
            'project_id' => $validatedData['project_id'],
            'task_name' => $validatedData['task_name'],
            'task_status' => 'PENDING',
            'created_by' => $created_by,
            'assigned_user' => $validatedData['assigned_user'],
            'task_due' => $validatedData['task_deadline']
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        $users = User::all();
        return view('tasks.edit', [
            'task' => $task,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'task_name' => 'required',
            'task_due' => 'required',
            'assigned_user' => 'required',
        ]);

        $task = Task::find($id);
        $task->update([
            'task_name' => $validatedData['task_name'],
            'task_due' => $validatedData['task_due'],
            'assigned_user' => $validatedData['assigned_user'],
        ]);


        // dd($request);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
