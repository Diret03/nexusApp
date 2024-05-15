<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'nullable|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', '¡El usuario se ha creado correctamente!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'nullable|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', '¡El usuario se ha actualizado correctamente!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', '¡El usuario se ha eliminado correctamente!');
    }
}
