@extends('layouts.app')

@section('title', 'Listado de Préstamos')

@section('content')
<div class="container my-5">
    {{-- Encabezado --}}
    <div class="text-center py-4" style="background-color: #2d3748;">
        <h1 class="text-white text-4xl font-bold">Listado de Préstamos</h1>
    </div>

    {{-- Botón para crear un nuevo préstamo --}}
    <div class="row justify-content-center my-4">
        <div class="col-12 text-center">
            <a href="{{ route('prestamos.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Crear Nuevo Préstamo
            </a>
            <a href="{{ route('prestamos.export') }}" class="btn btn-secondary btn-lg">
                <i class="bi bi-upload"></i> Exportar Préstamos (Excel)
            </a>
        </div>
    </div>

    {{-- Alertas de éxito --}}
    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    {{-- Tabla de préstamos --}}
    @if ($prestamos->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-warning text-center">
                    No hay préstamos registrados actualmente.
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre del Usuario</th>
                                <th>Elemento Prestado</th>
                                <th>Fecha de Préstamo</th>
                                <th>Fecha de Devolución</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestamos as $prestamo)
                                <tr>
                                    <td>{{ $prestamo->id }}</td>
                                    <td>{{ $prestamo->nombre_usuario }}</td>
                                    <td>{{ $prestamo->elemento_prestado }}</td>
                                    <td>{{ $prestamo->fecha_prestamo }}</td>
                                    <td>{{ $prestamo->fecha_devolucion }}</td>
                                    <td>
                                        {{-- Botón para editar --}}
                                        <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        {{-- Formulario para eliminar --}}
                                        <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este préstamo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
