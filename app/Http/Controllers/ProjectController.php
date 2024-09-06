<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['creator', 'tasks'])->get();

        // dd($projects->creator);

        // dd($projects);
        return view('project.index', compact('projects'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $values = [$request, auth()->user()->name];
        // dd($values);
        $validatedData = $request->validate([
            'proj_name' => 'required',
            'proj_desc' => 'required',
            'proj_deadline' => 'required|date',
        ]);

        $created_by = auth()->user()->id;

        Project::create([
            'proj_name' => $validatedData['proj_name'],
            'proj_desc' => $validatedData['proj_desc'],
            'proj_status' => 'PENDING',
            'proj_deadline' => $validatedData['proj_deadline'],
            'created_by' => $created_by,
        ]);

        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // // retrieve the project by its ID, along with all related task
        // $project = Project::with('tasks')->find($id);

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'proj_name' => 'required',
            'proj_desc' => 'required',
            'proj_deadline' => 'required|date',
            'proj_status' => 'required',
        ]);

        $created_by = auth()->user()->id;
        $project = Project::find($id);

        $project->update([
            'proj_name' => $validatedData['proj_name'],
            'proj_desc' => $validatedData['proj_desc'],
            'proj_status' => $validatedData['proj_status'],
            'proj_deadline' => $validatedData['proj_deadline'],
            'created_by' => $created_by,
        ]);

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project and related task records deleted successfully');

    }
}
