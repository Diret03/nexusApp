@extends('layouts.manager')

@section('main-content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Contenido principal -->
        <div id="content">
            <!-- Encabezado -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Título de la página -->
                <h1 class="h3 mb-0 text-gray-800">Entrevistas</h1>
                <!-- Botón para agregar -->
                <a href="{{ route('manager.interviews.create') }}" class="btn btn-primary btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Agregar Entrevista</span>
                </a>
            </nav>
            <!-- Contenido de la página -->

            <div class="container mt-4">
                <div class="row">
                    @foreach ($interviews as $interview)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $interview->name }}</h5>
                                    <p class="card-text">
                                        <strong>Fecha:</strong> {{ $interview->date->format('Y-m-d') }}<br>
                                        <strong>Descripción:</strong> {{ $interview->description }}<br>
                                        <strong>Cliente:</strong> {{ $interview->client->name }}
                                    </p>
                                    <form action="{{ route('manager.interviews.accept', $interview->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success"><i class="bi bi-check"></i></button>
                                    </form>
                                    <form action="{{ route('manager.interviews.archive', $interview->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-x"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
@endsection
