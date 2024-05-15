@extends('layouts.admin')

@section('main-content')
    <h1>Editar Entrevista</h1>
    <form action="{{ route('interviews.update', $interview->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $interview->name }}">
        </div>
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $interview->date }}">
        </div>
        <div class="form-group">
            <label for="description">Requerimientos:</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ $interview->description }}">
        </div>
        <div class="form-group">
            <label for="status">Estado:</label>
            <select class="form-control" id="status" name="status">
                <option value="0" {{ $interview->status == 0 ? 'selected' : '' }}>Archivado</option>
                <option value="1" {{ $interview->status == 1 ? 'selected' : '' }}>Aceptado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="client_id">Cliente:</label>
            <select class="form-control" id="client_id" name="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $interview->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection
