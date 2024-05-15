@extends('layouts.admin')

@section('main-content')
    <h1>Crear Proyecto</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="start_date">Fecha de Inicio:</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin:</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
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
            <input type="number" class="form-control" id="progress_percentage" name="progress_percentage">
        </div>
        {{-- <div class="form-group">
            <label for="client_id">Entrevista aceptada:</label>
            <select class="form-control" id="interview_id" name="interview_id">
                @foreach ($interviews as $interview)
                    <option value="{{ $interview->id }}">{{ $interview->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="interview_id">Entrevista aceptada:</label>
            <select class="form-control" id="interview_id" name="interview_id">
                <option value="">Seleccione una entrevista aceptada</option>
                @foreach ($interviews as $interview)
                    <option value="{{ $interview->id }}">{{ $interview->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="client_id">Cliente:</label>
            <select class="form-control" id="client_id" name="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
