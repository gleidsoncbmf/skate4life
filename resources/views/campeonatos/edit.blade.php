<x-app-layout>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Campeonato') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('campeonato.update', $campeonato->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-6">
                                <img src="http://localhost/sk8/storage/app/{{ $campeonato->cartaz }}" alt="{{ $campeonato->nome }}" style="max-height: 200px">
                                    <div class="custom-file">
                                        <input id="cartaz" type="file" class="custom-file-input @error('cartaz') is-invalid @enderror" name="cartaz">
                                        @error('cartaz')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $campeonato->nome }}" required autofocus>

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="local" class="col-md-2 col-form-label text-md-right">{{ __('Local') }}</label>

                                <div class="col-md-6">
                                    <input id="local" type="text" class="form-control @error('local') is-invalid @enderror" name="local" value="{{ $campeonato->local }}" required>

                                    @error('local')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data" class="col-md-2 col-form-label text-md-right">{{ __('Data') }}</label>

                                <div class="col-md-6">
                                    <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data" value="{{ $campeonato->data }}" required>

                                    @error('data')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="endereco" class="col-md-2 col-form-label text-md-right">{{ __('Endereço') }}</label>

                                <div class="col-md-6">
                                    <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ $campeonato->endereco }}" required autofocus>

                                    @error('endereco')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefone" class="col-md-2 col-form-label text-md-right">{{ __('Telefone(Whats)') }}</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $campeonato->telefone }}" required autofocus>

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="valor" class="col-md-2 col-form-label text-md-right">{{ __('Valor da Inscricao') }}</label>

                                <div class="col-md-6">
                                <input type="number" id="valor" name="valor" class="form-control @error('valor') is-invalid @enderror" value="{{ $campeonato->valor }}" step="0.01" min="0" placeholder="R$0,00" required autofocus>
                                    @error('valor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pix" class="col-md-2 col-form-label text-md-right">{{ __('Chave Pix') }}</label>

                                <div class="col-md-6">
                                    <input id="pix" type="text" class="form-control @error('pix') is-invalid @enderror" name="pix" value="{{ $campeonato->pix }}" required autofocus>

                                    @error('pix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="modalidades">{{ __('Modalidades') }}</label>
                                @foreach ($modalidades as $modalidade)
                                    <div class="form-check">
                                        <input id="modalidade-{{ $modalidade->id }}" class="form-check-input @error('modalidades') is-invalid @enderror" type="checkbox" name="modalidades[]" value="{{ $modalidade->id }}" @if(isset($campeonato) && $campeonato->modalidades->contains($modalidade)) checked @elseif(in_array($modalidade->id, old('modalidades', []))) checked @endif>
                                        <label class="form-check-label" for="modalidade-{{ $modalidade->id }}">{{ $modalidade->nome }}</label>
                                    </div>
                                @endforeach
                                @error('modalidades')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="categorias">{{ __('Categorias') }}</label>
                                @foreach ($categorias as $categoria)
                                    <div class="form-check">
                                        <input id="categoria-{{ $categoria->id }}" class="form-check-input @error('categorias') is-invalid @enderror" type="checkbox" name="categorias[]" value="{{ $categoria->id }}" @if(isset($campeonato) && $campeonato->categorias->contains($categoria)) checked @elseif(in_array($categoria->id, old('categorias', []))) checked @endif>
                                        <label class="form-check-label" for="categoria-{{ $categoria->id }}">{{ $categoria->nome }}</label>
                                    </div>
                                @endforeach
                                @error('categorias')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>    
                            <div class="form-group text-center btn btn-primary"> 
                                <button type="submit">
                                    {{ __('Atualizar Campeonato') }}
                                </button>
                            </div>  
</x-app-layout>