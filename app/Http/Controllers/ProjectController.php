<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use App\Models\Interview;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view(request()->segment(1) . '.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('manager.projects.show', compact('project'));
    }

    public function create()
    {
        $clients = Client::all(); // Obtener todos los clientes desde la base de datos
        $interviews = Interview::where('status', 1)->get();
        return view(request()->segment(1) . '.projects.create', compact('clients', 'interviews'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'progress_percentage' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'interview_id' => 'required|exists:interviews,id',
        ]);

        Project::create($validatedData);

        return redirect()->route(request()->segment(1) . '.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $clients = Client::all(); // Obtener todos los clientes desde la base de datos
        $interviews = Interview::where('status', 1)->get();
        return view(request()->segment(1) . '.projects.edit', compact('project', 'clients', 'interviews'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'progress_percentage' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'interview_id' => 'required|exists:interviews,id',
        ]);

        $project->update($validatedData);

        return redirect()->route(request()->segment(1) . '.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route(request()->segment(1) . '.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
