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
                                <strong>Porcentaje de Avance:</strong> {{ $task->progress_percentage }}%<br>
                                <strong>Analista:</strong> {{ $task->analyst->name }}<br>
                                <strong>Proyecto:</strong> {{ $task->project->name }}
                            </p>
                            <a href="{{ route('analyst.tasks.edit', $task->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('analyst.tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
