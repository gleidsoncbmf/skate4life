<x-app-layout> 

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
            
 
<br>
<br>
<br>

   <div class="container text-center">
        <h1 class="display-6"><strong>Lista de Campeonatos Disponíveis</strong></h1>
<br>
<br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Local</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campeonatos as $campeonato)
                    <tr>
                        <td>{{ $campeonato->id }}</td>
                        <td>{{ $campeonato->nome }}</td>
                        <td>{{ $campeonato->local }}</td>
                        <td>{{ \Carbon\Carbon::parse($campeonato->data)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('inscricoes.create', ['id' => $campeonato->id]) }}" class="btn btn-success">Inscrever-se</a>
                            <a href="{{ route('campeonato.showPublic', $campeonato) }}" class="btn btn-secondary">Detalhes</a> 
                            <a href="{{ route('campeonatos.inscricoesPublic', $campeonato->id) }}" class="btn btn-secondary">Visualizar Inscrições</a>            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
