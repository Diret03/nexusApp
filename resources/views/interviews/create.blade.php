@extends('layouts.admin')

@section('main-content')
    <h1>Crear Entrevista</h1>
    <form action="{{ route('interviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="status">Estado:</label>
            <select class="form-control" id="status" name="status">
                <option value="0">Archivada</option>
                <option value="1">Aceptada</option>
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
