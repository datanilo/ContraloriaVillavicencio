@extends('layouts.app')

@section('title', 'Listado de Equipos')

@section('content')
<div class="container my-5">
    {{-- Encabezado --}}
    <div class="text-center py-4" style="background-color: #2d3748;">
        <h1 class="text-white text-4xl font-bold">Listado de Equipos</h1>
    </div>
    
    <div class="text-center mb-4 mt-4">
    <form method="GET" action="{{ route('equipos.index') }}" class="d-flex justify-content-center">
        <input type="text" name="search" class="form-control w-100" style="max-width: 1000px;" placeholder="Buscar equipo..." value="{{ request()->get('search') }}">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="bi bi-search"></i> Buscar
        </button>
        @if(request()->get('search'))
            <a href="{{ route('equipos.index') }}" class="btn btn-secondary ml-2">
                <i class="bi bi-x-circle"></i> Limpiar
            </a>
        @endif
    </form>
</div>





    {{-- Botones de Importación y Exportación --}}
    <div class="text-center mb-4">
        @if(Auth::user()->role == 'admin')
            <a href="{{ route('equipos.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Agregar Equipo
            </a>
        @endif
        <a href="{{ route('equipos.import') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-download"></i> Importar Equipos
        </a>
        <a href="{{ route('equipos.export') }}" class="btn btn-secondary btn-lg">
            <i class="bi bi-upload"></i> Exportar Equipos (Excel)
        </a>
    </div>

    {{-- Tabla de Equipos --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre de Usuario</th>
                            <th>Placa</th>
                            <th>Fecha</th>
                            <th>Equipo</th>
                            <th>Especificaciones Técnicas</th>
                            <th>Monitor</th>
                            <th>Sistema Operativo</th>
                            <th>Licencia Antivirus</th>
                            <th>Fecha de Vencimiento</th>
                            <th>Office</th>
                            <th>CAN</th>
                            <th>Acciones</th>  {{-- Columna para el botón de eliminar --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->nombre_de_usuario ?? 'Sin asignar' }}</td>
                                <td>{{ $equipo->placa ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($equipo->fecha)->format('d/m/Y') ?? 'N/A' }}</td>
                                <td>{{ $equipo->equipo ?? 'N/A' }}</td>
                                <td>{{ $equipo->especificaciones ?? 'N/A' }}</td>
                                <td>{{ $equipo->monitor ?? 'N/A' }}</td>
                                <td>{{ $equipo->sistema_operativo ?? 'N/A' }}</td>
                                <td>{{ $equipo->licencia_antivirus ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($equipo->fecha_vencimiento)->format('d/m/Y') ?? 'N/A' }}</td>
                                <td>{{ $equipo->office ?? 'N/A' }}</td>
                                <td>{{ $equipo->can ?? 'N/A' }}</td>
                                <td>
                                    {{-- Formulario para eliminar un equipo --}}
                                    <form action="{{ route('equipos.destroy', $equipo->placa) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este equipo?');">
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

                {{-- Paginación --}}
                <div class="d-flex justify-content-center">
                    {{ $equipos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
