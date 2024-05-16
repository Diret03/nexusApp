@extends('layouts.admin')

@section('main-content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Contenido principal -->
        <div id="content">
            <!-- Encabezado -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Título de la página -->
                <h1 class="h3 mb-0 text-gray-800">Tareas</h1>
                <!-- Botón para agregar -->
                <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Agregar Tarea</span>
                </a>
            </nav>
            <!-- Contenido de la página -->
            <div class="container-fluid">
                <!-- Tabla -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>Porcentaje de Avance</th>
                                        <th>Analista</th>
                                        <th>Proyecto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->start_date->format('Y-m-d') }}</td>
                                            <td>{{ $task->end_date->format('Y-m-d') }}</td>
                                            <td>{{ $task->progress_percentage }}</td>
                                            <td>{{ $task->analyst->name }}</td>
                                            <td>{{ $task->project->name }}</td>
                                            <td>
                                                <!-- Botón para editar -->
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Formulario para eliminar -->
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
