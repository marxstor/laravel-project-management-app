<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class MyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mytasks = Task::where('assigned_user', auth()->user()->id)->get();
        // dd($mytasks);
        return view('my_task.index', compact('mytasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $my_task = Task::find($id);
        return view('my_task.edit', compact('my_task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'task_name' => 'required',
            'task_due' => 'required|date',
            'task_status' => 'required',
        ]);

        $task = Task::find($id);

        $task->update([
            'task_name' => $validatedData['task_name'],
            'task_due' => $validatedData['task_due'],
            'task_status' => $validatedData['task_status'],
        ]);

        return redirect()->route('my_task.index')->with('success', 'Task updated successfully');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
