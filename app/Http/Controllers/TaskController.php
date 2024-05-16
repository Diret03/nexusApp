<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Analyst;
use App\Models\Project;

class TaskController extends Controller
{
    public function index()
    {

        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $analysts = Analyst::all();

        $projects = Project::all();

        return view('tasks.create', compact('analysts', 'projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // Otras reglas de validación
        ]);

        $validatedData['start_date'] = $request->input('start_date');
        $validatedData['end_date'] = $request->input('end_date');
        $validatedData['status'] = $request->input('status');
        $validatedData['progress_percentage'] = $request->input('progress_percentage');
        $validatedData['analyst_id'] = $request->input('analyst_id');
        $validatedData['project_id'] = $request->input('project_id');

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', '¡La tarea se ha creado correctamente!');
    }


    public function edit(Task $task)
    {
        $analysts = Analyst::all();

        $projects = Project::all();
        return view('tasks.edit', compact('task', 'analysts', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:initiated,in_progress,cancelled,completed',
            'progress_percentage' => 'required|numeric',
            'analyst_id' => 'required|exists:analysts,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $validatedData['start_date'] = date('Y-m-d', strtotime($request->input('start_date')));
        $validatedData['end_date'] = date('Y-m-d', strtotime($request->input('end_date')));

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', '¡La tarea se ha actualizado correctamente!');
    }


    public function destroy(Task $task)
    {

        $task->delete();
        return redirect()->route('tasks.index')->with('success', '¡La tarea se ha eliminado correctamente!');
    }
}
