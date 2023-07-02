<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="text-center">
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <a href="{{ route('campeonato.create') }}" class="btn btn-success">Cadastrar Campeonato</a>
                        <a href="{{ route('campeonato.index') }}" class="btn btn-success">Gerenciar Campeonatos</a>
                        <a href="{{ route('categorias.index') }}" class="btn btn-success">Gerenciar Categorias</a>
                        <a href="{{ route('modalidades.index') }}" class="btn btn-success">Gerenciar Modalidades</a>
                    </div>
                 </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


