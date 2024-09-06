<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;


class DashboardController extends Controller
{
    public function index() {
        
        $projects = Project::all();
        $total_projects = $projects->count();
        $total_tasks = Task::count();
        $pending_projects = $projects->where('proj_status', 'PENDING')->count();
        $task_in_progresss = Task::where('task_status', 'IN PROGRESS')->count();
        $task_completed = Task::where('task_status', 'DONE')->count();

        // dd($projects->pending_tasks);
        return view('dashboard', [
                    'projects' => $projects,
                    'total_projects' => $total_projects,
                    'total_tasks' => $total_tasks,
                    'pending_projects' => $pending_projects,
                    'task_in_progress' => $task_in_progresss,
                    'task_completed' => $task_completed,
                    ]);
    }
}
