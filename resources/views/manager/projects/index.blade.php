@extends('layouts.manager')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Proyectos') }}</h1>

    <div class="row">
        @foreach ($projects as $project)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow h-100 border border-dark"> <!-- Clase de borde negro -->
                    <div class="card-body">
                        <div class="text-x font-weight-bold text-primary text-uppercase mb-3 ">{{ $project->name }}</div>
                        <p class="card-text"><strong>Fecha de Inicio:</strong> {{ $project->start_date->format('Y-m-d') }}
                        </p>
                        <p class="card-text"><strong>Fecha de Fin:</strong> {{ $project->end_date->format('Y-m-d') }}</p>
                        <p class="card-text"><strong>Estado:</strong> {{ $project->status }}</p>
                        <p class="card-text"><strong>Progreso:</strong> {{ $project->progress_percentage }}%</p>
                        <p class="card-text"><strong>Cliente:</strong> {{ $project->client->name }}</p>
                        {{-- <a href="{{ route('manager.projects.show', $project->id) }}" class="btn btn-primary">Ver Detalles</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
