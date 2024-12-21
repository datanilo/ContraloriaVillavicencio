@extends('layouts.app')

@section('title', 'Editar Solicitud de Soporte Técnico')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            {{-- Botón para volver a la lista de solicitudes --}}
            <div class="col-12 text-center mb-4">
                <a href="{{ route('solicitudes.index') }}" class="btn btn-success btn-lg">
                    <i class="bi bi-arrow-left"></i> Volver a la Lista
                </a>
            </div>

            {{-- Formulario de edición --}}
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-lg">
                    <h2 class="text-center mb-4">Editar Solicitud</h2>

                    <!-- Formulario -->
                    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT') <!-- Método PUT para actualización -->

                        <div class="row">
                            <!-- Campo: Nombre del Solicitante -->
                            <div class="col-md-6 mb-4">
                                <label for="nombre_solicitante" class="form-label">Nombre del Solicitante</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="nombre_solicitante" class="form-control" id="nombre_solicitante"
                                           placeholder="Ingrese su nombre"
                                           value="{{ old('nombre_solicitante', $solicitud->nombre_solicitante) }}" required>
                                </div>
                                @error('nombre_solicitante')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo: Placa del Equipo -->
                            <div class="col-md-6 mb-4">
                                <label for="placa_equipo" class="form-label">Placa del Equipo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-laptop"></i></span>
                                    <input type="text" name="placa_equipo" class="form-control" id="placa_equipo"
                                           placeholder="Ingrese la placa del equipo"
                                           value="{{ old('placa_equipo', $solicitud->placa_equipo) }}" required>
                                </div>
                                @error('placa_equipo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo: Mensaje -->
                        <div class="mb-4">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea name="mensaje" class="form-control" id="mensaje" rows="4" placeholder="Describa el problema" required>{{ old('mensaje', $solicitud->mensaje) }}</textarea>
                            @error('mensaje')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo: Estado -->
                        <div class="mb-4">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" class="form-control" id="estado" required>
                                <option value="Pendiente" {{ $solicitud->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Completado" {{ $solicitud->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                            </select>
                        </div>

                        <!-- Botón Guardar -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-lg hover-shadow-lg">
                                <i class="bi bi-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilo adicional -->
    <style>
        /* Borde negro para los campos de entrada */
        .needs-validation .form-control:invalid {
            border-color: #000;
        }

        .needs-validation .form-control:valid {
            border-color: #000;
        }

        /* Resaltar el borde al hacer focus */
        .needs-validation .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.25);
            border-color: #000;
        }

        /* Resaltar el texto de las etiquetas en negrita */
        .form-label {
            font-weight: bold;
            color: #000;
        }

        /* Estilo para el grupo de input */
        .input-group-text {
            background-color: #f0f0f0;
            border: 1px solid #ced4da;
        }

        .btn:hover {
            background-color: #0069d9;
            transition: 0.3s;
        }

        .btn:focus {
            outline: none;
        }

        /* Animación de sombra al pasar por encima del botón */
        .hover-shadow-lg:hover {
            box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.3);
        }
    </style>
@endsection
