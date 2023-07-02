<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $campeonato->nome }}
        </h2>
    </x-slot>

    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold text-lg mb-4">Detalhes do campeonato</h2>
                    <img src="http://localhost/sk8/storage/app/{{ $campeonato->cartaz }}" alt="Cartaz" style="display: block; margin: 0 auto; width: 100%; max-width: 300px;">
                    <br>
                    <p><strong>Local:</strong> {{ $campeonato->local }}</p>
                    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($campeonato->data)->format('d/m/Y') }}</p>
                    <p><strong>Endereço:</strong> {{ $campeonato->endereco }}</p>
                    <p><strong>Telefone:</strong> {{ $campeonato->telefone }}</p>
                    <p><strong>Valor da Inscrição:</strong> R$ {{ $campeonato->valor }}</p>
                    <p><strong>PIX:</strong> {{ $campeonato->pix }}</p>
<br>
                    <div style="display: grid; grid-template-columns: 1fr auto 1fr; grid-gap: 10px;" class="text-center">
                        <div>
                            <h3 class="font-bold text-lg mb-2"><strong>Modalidades</strong></h3>
                            <ul>
                                @foreach ($campeonato->modalidades as $modalidade)
                                    <li>{{ $modalidade->nome }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div style="grid-column: 2;">
                            <a href="{{ route('campeonatos.inscricoes', ['id' => $campeonato->id]) }}" class="btn btn-primary">Gerenciar Inscrições</a>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-2"><strong>Categorias</strong></h3>
                            <ul>
                                @foreach ($campeonato->categorias as $categoria)
                                    <li>{{ $categoria->nome }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

