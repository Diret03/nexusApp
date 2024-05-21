@extends('layouts.manager')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $project->name }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text"><strong>Fecha de Inicio:</strong> {{ $project->start_date }}</p>
            <p class="card-text"><strong>Fecha de Fin:</strong> {{ $project->end_date }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $project->status }}</p>
            <p class="card-text"><strong>Progreso:</strong> {{ $project->progress_percentage }}%</p>
            <p class="card-text"><strong>Cliente:</strong> {{ $project->client->name }}</p>
        </div>
    </div>
@endsection
