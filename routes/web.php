<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnalystController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas para la página de inicio según el rol del usuario
Route::get('/home', 'HomeController@index')->name('home');

// Rutas para Administrador
Route::group(['middleware' => ['role:Administrador']], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::get('admin/clients', [ClientController::class, 'index'])->name('admin.clients.index');
    Route::get('admin/clients/create', [ClientController::class, 'create'])->name('admin.clients.create');
    Route::post('admin/clients', [ClientController::class, 'store'])->name('admin.clients.store');
    Route::get('admin/clients/{client}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('admin/clients/{client}', [ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('admin/clients/{client}', [ClientController::class, 'destroy'])->name('admin.clients.destroy');

    Route::get('admin/interviews', [InterviewController::class, 'index'])->name('admin.interviews.index');
    Route::get('admin/interviews/create', [InterviewController::class, 'create'])->name('admin.interviews.create');
    Route::post('admin/interviews', [InterviewController::class, 'store'])->name('admin.interviews.store');
    Route::get('admin/interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('admin.interviews.edit');
    Route::put('admin/interviews/{interview}', [InterviewController::class, 'update'])->name('admin.interviews.update');
    Route::delete('admin/interviews/{interview}', [InterviewController::class, 'destroy'])->name('admin.interviews.destroy');

    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin.users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('admin/analysts', [AnalystController::class, 'index'])->name('admin.analysts.index');
    Route::get('admin/analysts/create', [AnalystController::class, 'create'])->name('admin.analysts.create');
    Route::post('admin/analysts', [AnalystController::class, 'store'])->name('admin.analysts.store');
    Route::get('admin/analysts/{analyst}/edit', [AnalystController::class, 'edit'])->name('admin.analysts.edit');
    Route::put('admin/analysts/{analyst}', [AnalystController::class, 'update'])->name('admin.analysts.update');
    Route::delete('admin.analysts/{analyst}', [AnalystController::class, 'destroy'])->name('admin.analysts.destroy');

    Route::get('admin/tasks', [TaskController::class, 'index'])->name('admin.tasks.index');
    Route::get('admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');
    Route::get('admin.tasks/{task}/edit', [TaskController::class, 'edit'])->name('admin.tasks.edit');
    Route::put('admin.tasks/{task}', [TaskController::class, 'update'])->name('admin.tasks.update');
    Route::delete('admin/tasks/{task}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');
});

// Rutas para Gerente
Route::group(['middleware' => ['role:Gerente']], function () {
    // Route::get('manager/home', 'HomeController@managerHome')->name('manager.home');
    Route::get('manager/interviews', [InterviewController::class, 'index'])->name('manager.interviews.index');
    Route::get('manager/interviews/create', [InterviewController::class, 'create'])->name('manager.interviews.create');
    Route::post('manager/interviews', [InterviewController::class, 'store'])->name('manager.interviews.store');
    Route::get('manager/interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('manager.interviews.edit');
    Route::put('manager.interviews/{interview}', [InterviewController::class, 'update'])->name('manager.interviews.update');
    Route::delete('manager.interviews/{interview}', [InterviewController::class, 'destroy'])->name('manager.interviews.destroy');
    Route::get('manager/projects', [ProjectController::class, 'index'])->name('manager.projects.index');
});

// Rutas para Jefe de Desarrollo
Route::group(['middleware' => ['role:Jefe de desarrollo']], function () {
    Route::get('developer/home', 'HomeController@developerHome')->name('developer.home');
    Route::get('developer/projects', [ProjectController::class, 'index'])->name('developer.projects.index');
    Route::get('developer/projects/create', [ProjectController::class, 'create'])->name('developer.projects.create');
    Route::post('developer/projects', [ProjectController::class, 'store'])->name('developer.projects.store');
    Route::get('developer.projects/{project}/edit', [ProjectController::class, 'edit'])->name('developer.projects.edit');
    Route::put('developer.projects/{project}', [ProjectController::class, 'update'])->name('developer.projects.update');
    Route::delete('developer.projects/{project}', [ProjectController::class, 'destroy'])->name('developer.projects.destroy');

    Route::get('developer/tasks', [TaskController::class, 'index'])->name('developer.tasks.index');
    Route::get('developer.tasks/create', [TaskController::class, 'create'])->name('developer.tasks.create');
    Route::post('developer.tasks', [TaskController::class, 'store'])->name('developer.tasks.store');
    Route::get('developer.tasks/{task}/edit', [TaskController::class, 'edit'])->name('developer.tasks.edit');
    Route::put('developer.tasks/{task}', [TaskController::class, 'update'])->name('developer.tasks.update');
    Route::delete('developer.tasks/{task}', [TaskController::class, 'destroy'])->name('developer.tasks.destroy');
});

// Rutas para Analista
Route::group(['middleware' => ['role:Analista']], function () {
    Route::get('analyst/home', 'HomeController@analystHome')->name('analyst.home');
    Route::get('analyst/tasks', [TaskController::class, 'index'])->name('analyst.tasks.index');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
