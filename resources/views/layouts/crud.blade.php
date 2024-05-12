@extends('layouts.app')

@section('main-content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Contenido principal -->
        <div id="content">
            <!-- Encabezado -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Título de la página -->
                <h1 class="h3 mb-0 text-gray-800">{{ $pageTitle }}</h1>
                <!-- Botón para agregar elemento -->
                @if (isset($createRoute))
                    <a href="{{ route($createRoute) }}" class="btn btn-primary btn-icon-split ml-auto">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">{{ $createText }}</span>
                    </a>
                @endif
            </nav>
            <!-- Contenido de la página -->
            <div class="container-fluid">
                <!-- Tabla de elementos -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    {{ $tableHeaders }}
                                </thead>
                                <tbody>
                                    {{ $slot }}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
