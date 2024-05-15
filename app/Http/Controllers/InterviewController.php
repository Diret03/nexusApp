<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\Client;

class InterviewController extends Controller
{
    /**
     * Muestra una lista de todas las entrevistas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $interviews = Interview::all();
        return view('interviews.index', compact('interviews'));
    }

    public function create()
    {
        $clients = Client::all(); // Obtener todos los clientes desde la base de datos
        return view('interviews.create', compact('clients')); // Pasar los clientes a la vista
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required|string|max:10000',
            'status' => 'required|boolean',
            'client_id' => 'required|exists:clients,id',
        ]);

        Interview::create($validatedData);

        return redirect()->route('interviews.index')->with('success', '¡La entrevista se ha creado correctamente!');
    }

    /**
     * Muestra el formulario para editar una entrevista existente.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\View\View
     */
    public function edit(Interview $interview)
    {
        $clients = Client::all();
        return view('interviews.edit', compact('interview', 'clients'));
    }

    /**
     * Actualiza una entrevista existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Interview $interview)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required|string|max:10000',
            'status' => 'required|boolean',
            'client_id' => 'required|exists:clients,id',
        ]);

        $validatedData['date'] = date('Y-m-d', strtotime($request->input('date')));

        $interview->update($validatedData);

        return redirect()->route('interviews.index')->with('success', '¡La entrevista se ha actualizado correctamente!');
    }

    /**
     * Elimina una entrevista existente de la base de datos.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();

        return redirect()->route('interviews.index')->with('success', '¡La entrevista se ha eliminado correctamente!');
    }
}
