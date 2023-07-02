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
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Instagram</th>
                    <th>Modalidade</th>
                    <th>Categoria</th>
                    <th>Pagamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscricoes as $inscricao)
                    <tr>
                        <td>{{ $inscricao->nome }}</td>
                        <td>{{ $inscricao->email }}</td>
                        <td>{{ $inscricao->telefone }}</td>
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
                        <td>
                            <form id="formAlterarPagamento{{ $inscricao->id }}" method="POST" action="{{ route('inscricao.alteraPagamento', $inscricao->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group text-center btn btn-primary">
                                    <button id="btnAlterarPagamento{{ $inscricao->id }}" type="submit">
                                        Pagamento
                                    </button>
                                </div>
                            </form>            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
<script>
    // Seleciona todos os botões de alterar pagamento
    var btnsAlterarPagamento = document.querySelectorAll('[id^="btnAlterarPagamento"]');

    // Itera sobre cada botão e adiciona o evento de clique
    btnsAlterarPagamento.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            // Impede o envio do formulário automaticamente
            e.preventDefault();

            // Obtém o ID do formulário associado ao botão
            var formId = this.getAttribute('id').replace('btnAlterarPagamento', 'formAlterarPagamento');

            // Exibe a caixa de diálogo de confirmação
            if (confirm('Deseja realmente alterar o pagamento?')) {
                // Se confirmado, envia o formulário correspondente
                document.getElementById(formId).submit();
            }
        });
    });
</script>


