@extends('layouts.admin')

@section('main-content')
    <h1>Editar Tarea</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}">
        </div>
        <div class="form-group">
            <label for="start_date">Fecha de Inicio:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $task->start_date }}">
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $task->end_date }}">
        </div>
        <div class="form-group">
            <label for="status">Estado:</label>
            <select class="form-control" id="status" name="status">
                <option value="initiated">Iniciado</option>
                <option value="in_progress">En Progreso</option>
                <option value="cancelled">Cancelado</option>
                <option value="completed">Completado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="progress_percentage">Porcentaje de Avance:</label>
            <input type="number" class="form-control" id="progress_percentage" name="progress_percentage"
                value="{{ $task->progress_percentage }}">
        </div>
        <div class="form-group">
            <label for="analyst_id">Analista Asignado:</label>
            <select class="form-control" id="analyst_id" name="analyst_id">
                @foreach ($analysts as $analyst)
                    <option value="{{ $analyst->id }}" {{ $task->analyst_id == $analyst->id ? 'selected' : '' }}>
                        {{ $analyst->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="project_id">Proyecto Asociado:</label>
            <select class="form-control" id="project_id" name="project_id">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection
