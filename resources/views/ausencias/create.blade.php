@extends('layouts.app')

@section('title', 'Crear Ausencia')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            {{-- Botón para volver a la lista de ausencias --}}
            <div class="col-12 text-center mb-4">
                <a href="{{ route('ausencias.index') }}" class="btn btn-success btn-lg">
                    <i class="bi bi-arrow-left"></i> Volver a la Lista
                </a>
            </div>

            {{-- Formulario de creación --}}
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-lg">
                    <h2 class="text-center mb-4">Formulario de Creación de Ausencia</h2>

                    <!-- Formulario -->
                    <form action="{{ route('ausencias.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <!-- Campo: Nombre del Usuario -->
                            <div class="col-md-6 mb-4">
                                <label for="nombre_usuario" class="form-label font-weight-bold">Nombre del Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Ingrese el nombre del usuario" value="{{ old('nombre_usuario') }}" required>
                                </div>
                                @error('nombre_usuario')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo: Fecha de Ausencia -->
                            <div class="col-md-6 mb-4">
                                <label for="fecha" class="form-label font-weight-bold">Fecha de la Ausencia</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" name="fecha" class="form-control" id="fecha" value="{{ old('fecha') }}" required>
                                </div>
                                @error('fecha')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Campo: Género -->
                            <div class="col-md-6 mb-4">
                                <label for="genero" class="form-label font-weight-bold">Género</label>
                                <select name="genero" class="form-select" id="genero" required>
                                    <option value="">Seleccione</option>
                                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('genero')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo: Motivo -->
                            <div class="col-md-6 mb-4">
                                <label for="motivo" class="form-label font-weight-bold">Motivo de la Ausencia</label>
                                <select name="motivo" class="form-select" id="motivo" required>
                                    <option value="">Seleccione</option>
                                    <option value="DP - Diligencia Personal" {{ old('motivo') == 'DP' ? 'selected' : '' }}>Diligencia Personal</option>
                                    <option value="CM - Cita Médica" {{ old('motivo') == 'CM' ? 'selected' : '' }}>Cita Médica</option>
                                    <option value="CO - Compensatorio" {{ old('motivo') == 'CO - Compensatorio' ? 'selected' : '' }}>Compensatorio</option>
                                    <option value="CD - Calamidad doméstica" {{ old('motivo') == 'CD - Calamidad doméstica' ? 'selected' : '' }}>Calamidad doméstica</option>
                                    <option value="CS - Comisión de Servicios" {{ old('motivo') == 'CS - Comisión de Servicios' ? 'selected' : '' }}>Comisión de Servicios</option>
                                    <option value="PS - Permiso Sindical" {{ old('motivo') == 'PS - Permiso Sindical' ? 'selected' : '' }}>Permiso Sindical</option>
                                    <option value="AT - Accidente Trabajo" {{ old('motivo') == 'AT - Accidente Trabajo' ? 'selected' : '' }}>Accidente Trabajo</option>
                                    <option value="EL - Enfermedad Laboral" {{ old('motivo') == 'EL - Enfermedad Laboral' ? 'selected' : '' }}>Enfermedad Laboral</option>
                                    <option value="EC - Enfermedad Común" {{ old('motivo') == 'EC - Enfermedad Común' ? 'selected' : '' }}>Enfermedad Común</option>
                                    <option value="AC - Accidente Común" {{ old('motivo') == 'AC - Accidente Común' ? 'selected' : '' }}>Accidente Común</option>
                                    <option value="PA - Permiso Académico" {{ old('motivo') == 'PA - Permiso Académico' ? 'selected' : '' }}>Permiso Académico</option>
                                    <option value="LC - Licencia" {{ old('motivo') == 'LC - Licencia' ? 'selected' : '' }}>Licencia</option>
                                    <option value="LM - Licencia Maternidad" {{ old('motivo') == 'LM - Licencia Maternidad' ? 'selected' : '' }}>Licencia Maternidad</option>
                                    <option value="LP - Licencia Paternidad" {{ old('motivo') == 'LP - Licencia Paternidad' ? 'selected' : '' }}>Licencia Paternidad</option>
                                    <option value="LT - Licencia Luto" {{ old('motivo') == 'LT - Licencia Luto' ? 'selected' : '' }}>Licencia Luto</option>
                                    <option value="PC - Permiso por Cumpleaños" {{ old('motivo') == 'PC - Permiso por Cumpleaños' ? 'selected' : '' }}>Permiso por Cumpleaños</option>
                                    <option value="DO - Docencia" {{ old('motivo') == 'DO - Docencia' ? 'selected' : '' }}>Docencia</option>
                                    <option value="LN - Licencia No Remunerada" {{ old('motivo') == 'LN - Licencia No Remunerada' ? 'selected' : '' }}>Licencia No Remunerada</option>
                                    <option value="TC - Trabajo en Casa" {{ old('motivo') == 'TC - Trabajo en Casa' ? 'selected' : '' }}>Trabajo en Casa</option>
                                    <option value="QN - Quinquenio" {{ old('motivo') == 'QN - Quinquenio' ? 'selected' : '' }}>Quinquenio</option>
                                    <option value="OT - Otros" {{ old('motivo') == 'OT - Otros' ? 'selected' : '' }}>Otros</option>

                                </select>
                                @error('motivo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo adicional según el motivo -->
                        <div id="campo-adicional" class="row" style="display: none;">
                            <div class="col-md-12 mb-4">
                                <label for="motivo_adicional" class="form-label font-weight-bold">Detalles adicionales del Motivo</label>
                                <textarea name="motivo_adicional" class="form-control" id="motivo_adicional" placeholder="Detalles adicionales del motivo" value="{{ old('motivo_adicional') }}"></textarea>
                            </div>
                        </div>

                        <!-- Campo: Horas de Ausencia -->
                        <div class="col-md-6 mb-4">
                            <label for="horas" class="form-label font-weight-bold">Horas de Ausencia (Opcional)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                <input type="number" name="horas" class="form-control" id="horas" placeholder="Ingrese las horas de ausencia" value="{{ old('horas', 0) }}">
                            </div>
                            @error('horas')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo: Horas Cargadas (Opcional) -->
                        <div class="col-md-6 mb-4">
                            <label for="horas_cargadas" class="form-label font-weight-bold">Horas Cargadas (Opcional)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                <input type="number" name="horas_cargadas" class="form-control" id="horas_cargadas" placeholder="Ingrese las horas cargadas (si aplica)" value="{{ old('horas_cargadas', 0) }}">
                            </div>
                            @error('horas_cargadas')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo: Cantidad de Días -->
                        <div class="col-md-6 mb-4">
                            <label for="cantidad_dias" class="form-label font-weight-bold">Cantidad de Días</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-day"></i></span>
                                <input type="number" name="cantidad_dias" class="form-control" id="cantidad_dias" placeholder="Ingrese la cantidad de días" value="{{ old('cantidad_dias', 0) }}">
                            </div>
                            @error('cantidad_dias')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón Enviar -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-lg hover-shadow-lg">
                                <i class="bi bi-send"></i> Registrar Ausencia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script para mostrar campo adicional --}}
    <script>
        document.getElementById('motivo').addEventListener('change', function () {
            var motivo = this.value;
            var campoAdicional = document.getElementById('campo-adicional');
            if (motivo == 'OT') {
                campoAdicional.style.display = 'block'; // Solo se muestra cuando se selecciona "Otros"
            } else {
                campoAdicional.style.display = 'none';
            }
        });
    </script>
@endsection
