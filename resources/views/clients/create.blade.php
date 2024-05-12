@extends('layouts.admin')


@section('main-content')
    <h1>Crear Cliente</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="phone_number">Teléfono:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
