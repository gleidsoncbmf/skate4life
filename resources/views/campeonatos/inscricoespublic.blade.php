@php
    require_once app_path().'/Helpers/pagamento_helper.php';
@endphp


<x-app-layout>
    <br>
    <div class="container text-center">
        <h1>Inscrições - {{ $campeonato->nome }}</h1>
        <br>
        <table class="table table-striped align-middle"">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Instagram</th>
                    <th>Modalidade</th>
                    <th>Categoria</th>
                    <th>Confimado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscricoes as $inscricao)
                    <tr>
                        <td>{{ $inscricao->nome }}</td>
                        <td>{{ $inscricao->instagram }}</td>
                        <td>{{ $inscricao->modalidade->nome }}</td>
                        <td>{{ $inscricao->categoria->nome }}</td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span style="font-size: 24px;">
                                    {!! displayPagamento($inscricao->pagamento) !!}
                                </span>
                            </div>
                        </td>       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>