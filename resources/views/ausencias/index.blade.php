@extends('layouts.app')

@section('title', 'Registro de Ausencias')

@section('content')


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <a href="{{ route('ausencias.create') }}" class="btn btn-success btn-lg">
                    <i class="bi bi-plus-circle"></i> Registrar Nueva Ausencia
                </a>
                <!-- Botón para exportar a Excel -->
                <a href="{{ route('ausencias.export') }}" class="btn btn-secondary btn-lg">
                    <i class="bi bi-upload"></i> Exportar Ausencias (Excel)
                </a>
            </div>

            @if(session('success'))
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if ($ausencias->isEmpty())
                <div class="col-md-8">
                    <div class="alert alert-warning text-center">
                        No hay ausencias registradas actualmente.
                    </div>
                </div>
            @else
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Nombre del Usuario</th>
                                    <th>Género</th>
                                    <th>Motivo</th>
                                    <th>Horas</th>
                                    <th>Horas Cargadas</th>
                                    <th>Cantidad de Días</th> <!-- Nueva columna -->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ausencias as $ausencia)
                                    <tr>
                                        <td>{{ $ausencia->id }}</td>
                                        <td>{{ $ausencia->fecha }}</td>
                                        <td>{{ $ausencia->nombre_usuario }}</td>
                                        <td>{{ $ausencia->genero }}</td>
                                        <td>{{ $ausencia->motivo }}</td>
                                        <td>{{ fmod($ausencia->horas, 1) == 0 ? intval($ausencia->horas) : number_format($ausencia->horas, 1) }}</td>
                                        <td>{{ fmod($ausencia->horas_cargadas, 1) == 0 ? intval($ausencia->horas_cargadas) : number_format($ausencia->horas_cargadas, 1) }}</td>
                                        <td>{{ $ausencia->cantidad_dias }}</td> <!-- Mostrar cantidad de días -->
                                        <td>
                                            <a href="{{ route('ausencias.edit', $ausencia->id) }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <form action="{{ route('ausencias.destroy', $ausencia->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta ausencia?');">
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
            @endif
        </div>
    </div>
@endsection
