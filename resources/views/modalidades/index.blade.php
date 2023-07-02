<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campeonatos') }}
        </h2>
    </x-slot>

    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modalidades as $modalidade)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $modalidade->id }}</td>
                                    <td class="px-4 py-2">{{ $modalidade->nome }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('modalidades.delete', ['id' => $modalidade->id]) }}">Deletar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="add-modalidade">
                <a href="{{ route('modalidades.create')}}" class="btn btn-primary">Adicionar Modalidade</a>
                </div>  
                <br>
            </div>
        </div>
    </div>
</x-app-layout>
