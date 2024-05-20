<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Analyst;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view(request()->segment(1) . '.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $analysts = Analyst::all();
        $projects = Project::all();
        return view(request()->segment(1) . '.create', compact('analysts', 'projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'progress_percentage' => 'required|numeric',
            'analyst_id' => 'required|exists:analysts,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        Task::create($validatedData);

        return redirect()->route(request()->segment(1) . '.index')
            ->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $analysts = Analyst::all();
        $projects = Project::all();
        return view(request()->segment(1) . '.edit', compact('task', 'analysts', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'progress_percentage' => 'required|numeric',
            'analyst_id' => 'required|exists:analysts,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($validatedData);

        return redirect()->route(request()->segment(1) . '.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route(request()->segment(1) . '.index')
            ->with('success', 'Task deleted successfully.');
    }
}
