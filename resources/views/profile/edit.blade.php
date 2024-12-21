@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-4">
                <h1 class="display-6">Perfil de Usuario</h1>
            </div>

            <!-- Mensaje de éxito -->
            @if(session('status'))
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Formulario para actualizar la información del perfil -->
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="bi bi-person-circle"></i> Actualizar Información del Perfil
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Formulario para cambiar la contraseña -->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="bi bi-lock"></i> Cambiar Contraseña
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Formulario para eliminar la cuenta -->
                <div class="card mb-4">
                    <div class="card-header bg-danger text-white">
                        <i class="bi bi-trash"></i> Eliminar Cuenta
                    </div>
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
