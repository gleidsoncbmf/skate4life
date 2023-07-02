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
                                <th class="px-4 py-2">Data</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campeonatos as $campeonato)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $campeonato->id }}</td>
                                    <td class="px-4 py-2">{{ $campeonato->nome }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($campeonato->data)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('campeonato.show', ['id' => $campeonato->id]) }}"class="btn btn-secondary">Visualizar</a>
                                        <a href="{{ route('campeonatos.inscricoes', ['id' => $campeonato->id]) }}" class="btn btn-primary">Inscrições</a> 
                                        <a href="{{ route('campeonato.edit', ['id' => $campeonato->id]) }}" class="btn btn-warning">Editar</a>
                                        <a href="{{ route('campeonatos.delete', ['id' => $campeonato->id]) }}"class="btn btn-danger">Deletar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
