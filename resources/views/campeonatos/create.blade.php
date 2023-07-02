<x-app-layout>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Campeonato') }}</div>

                <div class="card-body">
                <form method="POST" 
                    @if(isset($campeonato))
                        action="{{ route('campeonato.update', $campeonato->id) }}" 
                    @else
                        action="{{ route('campeonato.store') }}"
                    @endif
                    enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

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
                            <label for="local" class="col-md-4 col-form-label text-md-right">{{ __('Local') }}</label>

                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control @error('local') is-invalid @enderror" name="local" value="{{ old('local') }}" required>

                                @error('local')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                            <div class="col-md-6">
                                <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data" value="{{ old('data') }}" required>

                                @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" required autofocus>

                                @error('endereco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone(whats)') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autofocus>

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor da Inscrição') }}</label>

                            <div class="col-md-2">
                            <input type="number" id="valor" name="valor" class="form-control @error('valor') is-invalid @enderror" value="{{ old('valor') }}" step="0.01" min="0" placeholder="R$0,00" required autofocus>

                                @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pix" class="col-md-4 col-form-label text-md-right">{{ __('Chave Pix') }}</label>

                            <div class="col-md-6">
                                <input id="pix" type="text" class="form-control @error('pix') is-invalid @enderror" name="pix" value="{{ old('pix') }}" required autofocus>

                                @error('pix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cartaz" class="col-md-4 col-form-label text-md-right">{{ __('Cartaz') }}</label>

                            <div class="col-md-6">
                                <input id="cartaz" type="file" class="form-control-file @error('cartaz') is-invalid @enderror" name="cartaz">

                                @error('cartaz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="modalidades">Modalidades</label>
                            @foreach($modalidades as $modalidade)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="modalidades[]" id="{{ $modalidade->id }}" value="{{ $modalidade->id }}" @if(is_array(old('modalidades')) && in_array($modalidade->id, old('modalidades'))) checked @endif>
                                    <label class="form-check-label" for="{{ $modalidade->id }}">{{ $modalidade->nome }}</label>
                                </div>
                            @endforeach
                            @error('modalidades')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categorias">{{ __('Categorias') }}</label>
                            @foreach ($categorias as $categoria)
                                <div class="form-check">
                                    <input id="categoria-{{ $categoria->id }}" class="form-check-input @error('categorias') is-invalid @enderror" type="checkbox" name="categorias[]" value="{{ $categoria->id }}" @if(is_array(old('categorias')) && in_array($categoria->id, old('categorias'))) checked @endif>
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
                                {{ __('Criar Campeonato') }}
                            </button>
                       </div>
</x-app-layout>