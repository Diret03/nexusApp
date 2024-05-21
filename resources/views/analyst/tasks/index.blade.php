@extends('layouts.analyst')
@section('main-content')
    <div class="container mt-4">
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->name }}</h5>
                            <p class="card-text">
                                <strong>Fecha de Inicio:</strong> {{ $task->start_date->format('Y-m-d') }}<br>
                                <strong>Fecha de Fin:</strong> {{ $task->end_date->format('Y-m-d') }}<br>
                                <strong>Estado:</strong> {{ $task->status }}<br>
                                <strong>Porcentaje de Avance:</strong> {{ $task->progress_percentage }}%<br>
                                <strong>Analista:</strong> {{ $task->analyst->name }}<br>
                                <strong>Proyecto:</strong> {{ $task->project->name }}
                            </p>
                            <a href="{{ route('analyst.tasks.edit', $task->id) }}" class="btn btn-primary"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('analyst.tasks.markAsCompleted', $task->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
