<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view(request()->segment(1) . '.clients.index', compact('clients'));
    }

    public function create()
    {
        return view(request()->segment(1) . '.clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients',
            'phone_number' => 'required|max:20',
        ]);

        Client::create($validatedData);

        return redirect()->route(request()->segment(1) . '.clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view(request()->segment(1) . '.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone_number' => 'required|max:20',
        ]);

        $client->update($validatedData);

        return redirect()->route(request()->segment(1) . '.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route(request()->segment(1) . '.clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
