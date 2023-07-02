@extends('layouts.template')

@section('content')
    <div class="text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                            @foreach ($modalidades as $modalidade)
                                <tr>
                                    <td>{{ $modalidade->id }}</td>
                                    <td>{{ $modalidade->nome }}</td>
                                    <td>
                                        <a href="{{ route('modalidades.delete', ['id' => $modalidade->id]) }}">Deletar</a>
                                    </td>
                                </tr>
                            @endforeach
            </tbody>
        </table>
        <a href="{{ route('modalidades.create')}}">Adicionar Modalidade</a>
    </div>
@endsection