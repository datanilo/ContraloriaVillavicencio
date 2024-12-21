@extends('layouts.app')

@section('title', 'Solicitudes de Soporte Técnico')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <a href="{{ route('solicitudes.create') }}" class="btn btn-success btn-lg">
                    <i class="bi bi-plus-circle"></i> Crear Solicitud
                </a>
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('solicitudes.exportarPDF') }}" class="btn btn-danger btn-lg">
                        <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF
                    </a>
                @endif
            </div>

            @if(session('success'))
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if ($solicitudes->isEmpty())
                <div class="col-md-8">
                    <div class="alert alert-warning text-center">
                        No hay solicitudes registradas actualmente.
                    </div>
                </div>
            @else
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Solicitante</th>
                                    <th>Placa del Equipo</th>
                                    <th>Mensaje</th>
                                    <th>Fecha de Creación</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $solicitud->nombre_solicitante }}</td>
                                        <td>{{ $solicitud->placa_equipo }}</td>
                                        <td>{{ $solicitud->mensaje }}</td>
                                        <td>{{ $solicitud->created_at->format('d-m-Y H:i:s') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $solicitud->estado === 'Pendiente' ? 'warning' : 'success' }}">
                                                {{ $solicitud->estado }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                                <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </a>
                                            

                                            <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                            @endif
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
