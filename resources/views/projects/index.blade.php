@extends('layouts.admin')

@section('main-content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Contenido principal -->
        <div id="content">
            <!-- Encabezado -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Título de la página -->
                <h1 class="h3 mb-0 text-gray-800">Proyectos</h1>
                <!-- Botón para agregar -->
                <a href="{{ route('projects.create') }}" class="btn btn-primary btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Agregar Proyecto</span>
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
                                        <th>Cliente</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>Estado</th>
                                        <th>Porcentaje de Avance</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->client->name }}</td>
                                            <td>{{ $project->start_date->format('Y-m-d') }}</td>
                                            <td>{{ $project->end_date->format('Y-m-d') }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>{{ $project->progress_percentage }}</td>
                                            <td>
                                                <!-- Botón para editar -->
                                                <a href="{{ route('projects.edit', $project->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Formulario para eliminar -->
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este proyecto?')">
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
