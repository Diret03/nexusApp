@extends('layouts.admin')

@section('main-content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Contenido principal -->
        <div id="content">
            <!-- Encabezado -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Título de la página -->
                <h1 class="h3 mb-0 text-gray-800">Analistas</h1>
                <!-- Botón para agregar analista -->
                <a href="{{ route('admin.analysts.create') }}" class="btn btn-primary btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Agregar Analista</span>
                </a>
            </nav>
            <!-- Contenido de la página -->
            <div class="container-fluid">
                <!-- Tabla de analistas -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($analysts as $analyst)
                                        <tr>
                                            <td>{{ $analyst->name }}</td>
                                            <td>{{ $analyst->email }}</td>
                                            <td>{{ $analyst->phone_number }}</td>
                                            <td>
                                                <!-- Botón para editar analista -->
                                                <a href="{{ route('admin.analysts.edit', $analyst->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Formulario para eliminar analista -->
                                                <form action="{{ route('admin.analysts.destroy', $analyst->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este analista?')">
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
