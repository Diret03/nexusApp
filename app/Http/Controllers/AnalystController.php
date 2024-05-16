<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analyst;

class AnalystController extends Controller
{
    public function index()
    {
        $analysts = Analyst::all();
        return view('analysts.index', compact('analysts'));
    }

    public function create()
    {
        return view('analysts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:analysts,email',
            'phone_number' => 'nullable'
        ]);

        Analyst::create($request->all());
        return redirect()->route('analysts.index')->with('success', 'Analyst created successfully.');
    }

    public function edit($id)
    {
        $analyst = Analyst::findOrFail($id);
        return view('analysts.edit', compact('analyst'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:analysts,email,' . $id,
            'phone_number' => 'nullable'
        ]);

        $analyst = Analyst::findOrFail($id);
        $analyst->update($request->all());
        return redirect()->route('analysts.index')->with('success', 'Analyst updated successfully.');
    }

    public function destroy($id)
    {
        $analyst = Analyst::findOrFail($id);
        $analyst->delete();
        return redirect()->route('analysts.index')->with('success', 'Analyst deleted successfully.');
    }
}
