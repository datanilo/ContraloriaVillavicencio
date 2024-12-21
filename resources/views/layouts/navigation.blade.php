<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Menu Toggle Button for Mobile -->
                <button @click="open = !open" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                    <i class="bi bi-list"></i> <!-- Icono de menú hamburguesa -->
                </button>
            </div>
            <div class="flex-1 flex items-center justify-start sm:items-stretch sm:justify-start">
                <!-- Logo y Texto -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl">Contraloría CMV</a>
                </div>
                <div class="sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Enlace común a todos los usuarios autenticados -->
                        @auth
                            <a href="{{ route('solicitudes.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                Solicitudes
                            </a>
                        @endauth

                        <!-- Enlaces solo para administradores -->
                        @if(Auth::user() && Auth::user()->role == 'admin')
                            <a href="{{ route('equipos.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                Equipos
                            </a>
                            <a href="{{ route('prestamos.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                Préstamos
                            </a>
                            <a href="{{ route('ausencias.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                Ausencias
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Botón Perfil -->
            <div class="ml-3 relative flex">
                @if (Auth::check())
                    <span class="text-sm font-medium text-white mr-2">
                        {{ Auth::user()->name }}
                    </span>
                @endif

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 transition">
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Perfil -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                
            </div>
        </div>
    </div>

    <!-- Menu desplegable para dispositivos móviles -->
    <div x-show="open" class="sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Enlace común a todos los usuarios autenticados -->
            @auth
                <a href="{{ route('solicitudes.index') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium">
                    Solicitudes
                </a>
            @endauth

            <!-- Enlaces solo para administradores -->
            @if(Auth::user() && Auth::user()->role == 'admin')
                <a href="{{ route('equipos.index') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium">
                    Equipos
                </a>
                <a href="{{ route('prestamos.index') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium">
                    Préstamos
                </a>
                <a href="{{ route('ausencias.index') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium">
                    Ausencias
                </a>
            @endif

            <!-- Perfil y Logout en móvil -->
            <a href="{{ route('profile.edit') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium">
                Perfil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium"
                onclick="event.preventDefault(); this.closest('form').submit();">
                    Cerrar Sesión
                </a>
            </form>
        </div>
    </div>
</nav>
