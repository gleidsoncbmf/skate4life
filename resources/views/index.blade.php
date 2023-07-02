<x-app-layout>
<header>
    @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logar</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar</a>
                    @endif
                @endauth
            </div>
        @endif  
</header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 class="text-center">Inicio</h1>
</x-app-layout>