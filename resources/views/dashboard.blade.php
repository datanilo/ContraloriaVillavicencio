@extends('layouts.app')

@section('content')
<style>
    .body{
        background-color: white;
    }
</style>
    <div class="container mx-auto py-16 relative">
        @if(Auth::user()->role == 'admin')

            <!-- Contenido exclusivo para administradores -->

            <!-- Título y Misión -->
            <div class="mb-5 text-center relative z-10">
                <h2 class="font-semibold text-4xl text-gray-800 leading-tight mb-3">
                    Misión
                </h2>
                <p class="text-gray-600 text-xl mx-auto max-w-6xl px-8">
                Vigilar y controlar la gestión fiscal del municipio de Villavicencio, sus entidades descentralizadas, los puntos de control y de todos aquellos particulares o públicos que administren recursos del orden municipal, de la mano de la comunidad y con un recurso humano calificado y competitivo y con total apego a la constitución y la ley, en cada una de sus actuaciones y decisiones.
                </p>
            </div>

            <!-- Visión -->
            <div class="mb-16 text-center relative z-10">
                <h2 class="font-semibold text-4xl text-gray-800 leading-tight mb-3">
                    Visión
                </h2>
                <p class="text-gray-600 text-xl mx-auto max-w-6xl px-8">
                Para el año 2025, la Contraloría Municipal de Villavicencio será reconocida a nivel nacional como un ente de control fiscal territorial, con altos estándares de calidad, que, mediante el cumplimiento eficaz, eficiente y efectivo de su misión, contribuye al desarrollo social, económico, ecológico y ambiental del municipio, siendo reconocida por la ciudadanía por sus resultados.
                </p>
            </div>
        @elseif(Auth::user()->role == 'user')
            <!-- Contenido para usuarios normales -->
            <div class="mb-32 text-center relative z-10">


                <h2 class="font-semibold text-4xl text-gray-800 leading-tight mb-6">
                    Solicitudes
                </h2>
                <p class="text-gray-600 text-2xl mx-auto max-w-6xl px-8">
                    Aquí puedes gestionar tus solicitudes. Por favor, usa el módulo de solicitudes para realizar cualquier solicitud nueva o revisar el estado de las existentes.
                </p>

                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Contraloría de Villavicencio" class="img-fluid mb-4 w-25" style="position: fixed; bottom: 0; left: 50%; transform: translateX(-50%);">


            </div>
        @endif

        <!-- Logo como Marca de Agua -->
         

    </div>
@endsection
