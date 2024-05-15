<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use App\Models\Interview;

class ProjectController extends Controller
{

    public function index()
    {

        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::all(); // Obtener todos los clientes desde la base de datos
        // $interviews = Interview::all(); // Obtener todos los entrevistas desde la base de datos
        $interviews = Interview::where('status', 1)->get();
        return view('projects.create', compact('clients', 'interviews')); // Pasar los clientes a la vista
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
        $validatedData['client_id'] = $request->input('client_id');
        $validatedData['interview_id'] = $request->input('client_id');

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha creado correctamente!');
    }


    public function edit(Project $project)
    {
        $clients = Client::all();
        // $interviews = Interview::all(); // Obtener todos los entrevistas desde la base de datos
        $interviews = Interview::where('status', 1)->get();
        return view('projects.edit', compact('project', 'clients', 'interviews'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:initiated,in_progress,cancelled,completed',
            'progress_percentage' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'interview_id' => 'required|exists:interviews,id',
        ]);

        $validatedData['start_date'] = date('Y-m-d', strtotime($request->input('start_date')));
        $validatedData['end_date'] = date('Y-m-d', strtotime($request->input('end_date')));

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha actualizado correctamente!');
    }


    public function destroy(Project $project)
    {
        // Eliminar el proyecto de la base de datos
        $project->delete();

        // Redirigir a la lista de proyectos con un mensaje de éxito
        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha eliminado correctamente!');
    }
}
