@extends('layouts.admin')

{{-- @section('main-content')
    <h1>Editar Cliente</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}">
        </div>
        <div class="form-group">
            <label for="phone_number">Teléfono:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number"
                value="{{ $client->phone_number }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection --}}

@section('main-content')
    <h1>Editar Proyecto</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
        </div>
        <div class="form-group">
            <label for="start_date">Fecha de Inicio:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}">
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}">
        </div>
        <div class="form-group">
            <label for="status">Estado:</label>
            <select class="form-control" id="status" name="status">
                <option value="initiated" {{ $project->status == 'initiated' ? 'selected' : '' }}>Iniciado</option>
                <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                <option value="cancelled" {{ $project->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="progress_percentage">Porcentaje de Avance:</label>
            <input type="number" class="form-control" id="progress_percentage" name="progress_percentage"
                value="{{ $project->progress_percentage }}">
        </div>
        <div class="form-group">
            <label for="client_id">Cliente:</label>
            <select class="form-control" id="client_id" name="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection
