<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Log::info('Iniciando el proceso de creación de usuario.');

        // Registro antes de la validación
        Log::info('Datos recibidos del formulario: ', $request->all());

        try {
            // Validación
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|exists:roles,name',
            ]);

            Log::info('Validación completada.');

            // Registro antes de la creación del usuario
            Log::info('Datos validados: ', $validatedData);

            // Creación del usuario
            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Log::info('Usuario creado: ', ['user_id' => $user->id]);

            // Asignación del rol
            $user->assignRole($request->role);

            Log::info('Rol asignado: ', ['role' => $request->role]);

            return redirect()->route('admin.users.index')
                ->with('success', 'Usuario creado exitosamente.');
        } catch (ValidationException $e) {
            Log::error('Error de validación: ', ['errors' => $e->errors()]);

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error al crear el usuario: ', ['error' => $e->getMessage()]);

            return redirect()->back()
                ->with('error', 'Ocurrió un error al crear el usuario. Por favor, inténtelo de nuevo.')
                ->withInput();
        }
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        Log::info('Iniciando el proceso de actualización de usuario.');

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        Log::info('Validación completada.');

        try {
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);

            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $user->syncRoles($request->role);

            Log::info('Usuario actualizado: ', ['user_id' => $user->id]);

            return redirect()->route('admin.users.index')
                ->with('success', 'Usuario actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el usuario: ', ['error' => $e->getMessage()]);

            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el usuario. Por favor, inténtelo de nuevo.')
                ->withInput();
        }
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
