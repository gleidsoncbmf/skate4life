<x-app-layout> 
<br>  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscrição para {{ $campeonato->nome }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('inscricoes.store',['id' => $campeonato->id])}}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="local" class="col-md-2 col-form-label text-md-right">{{ __('Apelido') }}</label>

                            <div class="col-md-6">
                                <input id="apelido" type="text" class="form-control @error('apelido') is-invalid @enderror" name="apelido" value="{{ old('apelido') }}">

                                @error('apelido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram" class="col-md-2 col-form-label text-md-right">{{ __('Instagram: ') }}</label>

                            <div class="col-md-6">
                                <input id="instagram" type="text" class="form-control @error('nome') is-invalid @enderror" name="instagram" value="{{ old('instagram') }}" required autofocus>

                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-mail: ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-2 col-form-label text-md-right">{{ __('Telefone:') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autofocus>
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
<br>
<br>
<br>
                        <div class="form-group">
                            <label for="modalidades">Modalidade:</label>
                            <select name="modalidade_id" id="modalidade "class="col-md-4 col-form-select form-select-sm">
                                @foreach($modalidades as $modalidade)
                                    <option value="{{ $modalidade->id }}">{{ $modalidade->nome }}</option>
                                @endforeach
                            </select>
                        </div>
<br>
<br>
                        <div class="form-group" >
                            <label for="categorias" >{{ __('Categoria :') }}</label>
                                <select name="categoria_id" id="categoria" class="col-md-4 col-form-select form-select-sm">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                                </select>
                        <br>   
                        <br> 
                        <div class="form-group text-center btn btn-primary"> 
                            <button type="submit">Inscrever-se</button>
                       </div>

</div>
</div>
</div>
</div>

<div class="text-center btn btn-primary" style="max-width: 20x; margin: 10px"> 
    <a href="http://localhost:8000/"><button type="button" formnovalidate>Voltar para Pagina Inicial</button></a>
</div>

</x-app-layout>


