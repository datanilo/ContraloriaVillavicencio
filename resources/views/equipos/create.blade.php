@extends('layouts.app')

@section('title', 'Crear Nuevo Equipo')

@section('content')
<div class="container my-5">
    <div class="text-center py-4" style="background-color: #2d3748;">
        <h1 class="text-white text-4xl font-bold">Crear Nuevo Equipo</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Formulario -->
            <form action="{{ route('equipos.store') }}" method="POST">
                @csrf
                
                {{-- Nombre de Usuario --}}
                <div class="mb-4">
                    <label for="nombre_de_usuario" class="form-label font-weight-bold">Nombre de Usuario</label>
                    <input type="text" name="nombre_de_usuario" class="form-control" value="{{ old('nombre_de_usuario') }}" placeholder="Nombre del usuario" required>
                    @error('nombre_de_usuario')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Placa --}}
                <div class="mb-4">
                    <label for="placa" class="form-label font-weight-bold">Placa</label>
                    <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa') }}" placeholder="Placa del equipo" required>
                    @error('placa')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha --}}
                <div class="mb-4">
                    <label for="fecha" class="form-label font-weight-bold">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
                    @error('fecha')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Modelo --}}
                <div class="mb-4">
                    <label for="equipo" class="form-label font-weight-bold">Equipo</label>
                    <input type="text" name="equipo" id="equipo" class="form-control" value="{{ old('equipo') }}" placeholder="Tipo de equipo" required>
                    @error('modelo')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Especificaciones Técnicas --}}
                <div class="mb-4">
                    <label for="especificaciones" class="form-label font-weight-bold">Especificaciones Técnicas</label>
                    <input type="text" name="especificaciones" id="especificaciones" class="form-control" value="{{ old('especificaciones') }}" placeholder="Especificaciones del equipo" required>
                    @error('especificaciones')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Monitor --}}
                <div class="mb-4">
                    <label for="monitor" class="form-label font-weight-bold">Monitor</label>
                    <input type="text" name="monitor" id="monitor" class="form-control" value="{{ old('monitor') }}" placeholder="Marca/Modelo del monitor" required>
                    @error('monitor')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Sistema Operativo --}}
                <div class="mb-4">
                    <label for="sistema_operativo" class="form-label font-weight-bold">Sistema Operativo</label>
                    <input type="text" name="sistema_operativo" id="sistema_operativo" class="form-control" value="{{ old('sistema_operativo') }}" placeholder="Sistema operativo del equipo" required>
                    @error('sistema_operativo')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Licencia Antivirus --}}
                <div class="mb-4">
                    <label for="licencia_antivirus" class="form-label font-weight-bold">Licencia Antivirus</label>
                    <input type="text" name="licencia_antivirus" id="licencia_antivirus" class="form-control" value="{{ old('licencia_antivirus') }}" placeholder="Licencia del antivirus" required>
                    @error('licencia_antivirus')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fecha de Vencimiento --}}
                <div class="mb-4">
                    <label for="fecha_vencimiento" class="form-label font-weight-bold">Fecha de Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento') }}" required>
                    @error('fecha_vencimiento')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Office --}}
                <div class="mb-4">
                    <label for="office" class="form-label font-weight-bold">Office</label>
                    <input type="text" name="office" id="office" class="form-control" value="{{ old('office') }}" placeholder="Versión de Office" required>
                    @error('office')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CAN --}}
                <div class="mb-4">
                    <label for="can" class="form-label font-weight-bold">CAN</label>
                    <input type="number" name="can" id="can" class="form-control" value="{{ old('can') }}" placeholder="Número de CAN" required>
                    @error('can')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Botón de Guardar --}}
                <button type="submit" class="btn btn-success btn-lg">Guardar Equipo</button>
            </form>
        </div>
    </div>
</div>
@endsection
