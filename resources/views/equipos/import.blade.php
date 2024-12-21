@extends('layouts.app')

@section('title', 'Importar Equipos')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-4">
            <h3>Importar Equipos</h3>
        </div>

        @if(session('success'))
        <div class="col-md-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <div class="col-md-8">
            <form action="{{ route('equipos.importStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="archivo" class="form-label">Seleccionar archivo</label>
                    <input type="file" name="archivo" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Subir archivo</button>
            </form>
        </div>
    </div>
</div>
@endsection

