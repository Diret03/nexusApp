<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    use HasRoles;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $users = User::count();

    //     $widget = [
    //         'users' => $users,
    //         //...
    //     ];

    //     return view('home', compact('widget'));
    // }

    public function index()
    {
        $users = User::count();
        $projects = Project::count();
        $tasks = Task::count();

        $widget = [
            'users' => $users,
            'projects' => $projects,
            'tasks' => $tasks,
        ];

        /** @var \App\Models\User */
        $user = auth()->user();

        // Redirige según el rol del usuario
        if ($user->hasRole('Administrador')) {
            return view('admin.home', compact('widget'));
        } elseif ($user->hasRole('Gerente')) {
            return view('manager.home', compact('widget'));
        } elseif ($user->hasRole('Jefe de desarrollo')) {
            return view('developer.home', compact('widget'));
        } elseif ($user->hasRole('Analista')) {
            return view('analyst.home', compact('widget'));
        } else {
            // Rol no reconocido, redirige a una página por defecto
            return redirect('/');
        }
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function managerHome()
    {
        return view('manager.home');
    }

    public function developerHome()
    {
        return view('developer.home');
    }

    public function analystHome()
    {
        return view('analyst.home');
    }
}
