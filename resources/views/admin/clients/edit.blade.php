@extends('layouts.admin')

@section('main-content')
    <h1>Editar Cliente</h1>
    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
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
@endsection
