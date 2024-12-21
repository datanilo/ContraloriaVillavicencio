<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Perfil de Usuario</h1>
    </x-slot>

    <div class="container mx-auto mt-5">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold">Detalles del Perfil</h2>
            <div class="mt-4">
                <p><strong>Nombre:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Fecha de creación:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                <p><strong>Última actualización:</strong> {{ $user->updated_at->format('d/m/Y') }}</p>
            </div>

            <div class="mt-5">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
            </div>
        </div>
    </div>
</x-app-layout>
