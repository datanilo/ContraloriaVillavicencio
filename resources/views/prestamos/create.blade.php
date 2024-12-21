@extends('layouts.app')

@section('title', 'Crear Préstamo')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Crear Nuevo Préstamo</h1>

    <!-- Mostrar los errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="equipo" class="form-label">Nombre del solicitante</label>
            <select name="equipo" id="equipo" class="form-control" required>
                <option value="">Seleccione una persona</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->nombre_de_usuario}}">
                        {{ $equipo->nombre_de_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="elemento_prestado" class="form-label">Elemento a Prestar</label>
            <input type="text" class="form-control" name="elemento_prestado" id="elemento_prestado" required>
        </div>

        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
            <input type="date" class="form-control" name="fecha_prestamo" id="fecha_prestamo" required>
        </div>

        <div class="mb-3">
            <label for="fecha_devolucion" class="form-label">Fecha de Devolución (Opcional)</label>
            <input type="date" class="form-control" name="fecha_devolucion" id="fecha_devolucion">
        </div>

        <button type="submit" class="btn btn-primary btn-lg">Crear Préstamo</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary btn-lg">Volver</a>

    </form>
</div>
@endsection
