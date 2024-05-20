@extends('layouts.admin')

@section('main-content')
    <h1>Editar Usuario</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="name">Apellido:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <!-- Aquí puedes agregar más campos de usuario si es necesario -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection
