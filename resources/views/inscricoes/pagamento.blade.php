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
                    <h2 class="font-bold text-lg mb-4"><strong>Siga os Passos para o Pagamento</strong></h2>
                    <h2 class="font-bold text-lg mb-4"><strong>R$ {{ $campeonato->valor }}</strong></h2>
                    <strong><p>Fazer o pix para: </strong>{{ $campeonato->pix }}</p>
                    <br>
                    <p><strong>Enviar o comprovante para o Whats:</strong> {{ $campeonato->telefone }}</p>
</br>
                   <div class="text-center">
                        <a href="http://localhost:8000/" class="btn btn-secondary">Voltar para Pagina Inicial</a></li>
                    </div
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
