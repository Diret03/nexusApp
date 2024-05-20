<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Client;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::all();
        return view(request()->segment(1) . '.interviews.index', compact('interviews'));
    }

    public function create()
    {
        $clients = Client::all();
        return view(request()->segment(1) . '.interviews.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required',
            'status' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);

        Interview::create($validatedData);

        return redirect()->route(request()->segment(1) . '.interviews.index')
            ->with('success', 'Interview created successfully.');
    }

    public function edit(Interview $interview)
    {
        $clients = Client::all();
        return view(request()->segment(1) . '.interviews.edit', compact('interview','clients'));
    }

    public function update(Request $request, Interview $interview)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required',
            'status' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);

        $interview->update($validatedData);

        return redirect()->route(request()->segment(1) . '.interviews.index')
            ->with('success', 'Interview updated successfully.');
    }

    public function destroy(Interview $interview)
    {
        $interview->delete();
        return redirect()->route(request()->segment(1) . '.interviews.index')
            ->with('success', 'Interview deleted successfully.');
    }
}
