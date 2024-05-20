<?php

namespace App\Http\Controllers;

use App\Models\Analyst;
use Illuminate\Http\Request;

class AnalystController extends Controller
{
    public function index()
    {
        $analysts = Analyst::all();
        return view(request()->segment(1) . '.analysts.index', compact('analysts'));
    }

    public function create()
    {
        return view(request()->segment(1) . '.analysts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:analysts',
            'phone_number' => 'required|max:20',
        ]);

        Analyst::create($validatedData);

        return redirect()->route(request()->segment(1) . '.analysts.index')
            ->with('success', 'Analyst created successfully.');
    }

    public function edit(Analyst $analyst)
    {
        return view(request()->segment(1) . '.analysts.edit', compact('analyst'));
    }

    public function update(Request $request, Analyst $analyst)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:analysts,email,' . $analyst->id,
            'phone_number' => 'required|max:20',
        ]);

        $analyst->update($validatedData);

        return redirect()->route(request()->segment(1) . '.analysts.index')
            ->with('success', 'Analyst updated successfully.');
    }

    public function destroy(Analyst $analyst)
    {
        $analyst->delete();
        return redirect()->route(request()->segment(1) . '.analysts.index')
            ->with('success', 'Analyst deleted successfully.');
    }
}
