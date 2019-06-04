@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Dados Pessoais e Funcionais</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="primeiroNome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-md-6">
                            <input id="primeiroNome" type="text" class="form-control @error('primeiroNome') is-invalid @enderror" name="primeiroNome" value="{{ old('primeiroNome') }}" required autocomplete="primeiroNome" autofocus>
                            @error('primeiroNome')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div>   <!--primeiroNome-->

                    <div class="form-group row">
                        <label for="ultimoNome" class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome') }}</label>
                        <div class="col-md-6">

                            <input id="ultimoNome" type="text" class="form-control" name="ultimoNome" value="{{ old('ultimoNome') }}" required autocomplete="ultimoNome">
                            @error('ultimoNome')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                    </div> <!--ultimoNome-->

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div> <!--email-->

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div> <!--password-->

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div> <!--password conf-->

                    <!--<div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Escolha uma foto</label>
                    </div>-->

                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                        <div class="col-md-6">
                            <input id="foto" type="text" class="form-control" name="foto" value="{{ old('foto') }}" required autocomplete="foto">
                        </div>
                    </div> <!--foto-->

                    <div class="form-group row">
                        <label for="cargo_id" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" id="cargo_id" name="cargo_id" value="{{ old('cargo_id') }}" required autocomplete="cargo_id" >
                                @foreach ($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--cargo-->

                    <div class="form-group row">
                        <label for="funcao_id" class="col-md-4 col-form-label text-md-right">{{ __('Função') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" id="funcao_id" name="funcao_id" value="{{ old('funcao_id') }}" required autocomplete="funcao_id" >
                                @foreach ($funcoes as $funcao)
                                    <option value="{{$funcao->id}}">{{$funcao->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!--funcao-->

                    <div class="form-group row">
                        <label for="agencia_id" class="col-md-4 col-form-label text-md-right">{{ __('Agência') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" id="agencia_id" name="agencia_id" value="{{ old('agencia_id') }}" required autocomplete="agencia_id" >
                                @foreach ($agencias as $agencia)
                                    <option value="{{$agencia->id}}">{{$agencia->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!--agencia-->

                    <div class="form-group row">
                        <label for="dataNascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data Nascimento') }}</label>
                        <div class="col-md-6">
                            <input id="dataNascimento" type="text" class="form-control" name="dataNascimento" value="{{ old('dataNascimento') }}" required autocomplete="dataNascimento">
                        </div>
                    </div> <!--dataNascimento-->

                    <div class="form-group row">
                        <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matrícula') }}</label>
                        <div class="col-md-6">
                            <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula">
                        </div>
                    </div> <!--matricula-->

                    <div class="form-group row">
                        <label for="dataAdmissao" class="col-md-4 col-form-label text-md-right">{{ __('Data Admissão') }}</label>
                        <div class="col-md-6">
                            <input id="dataAdmissao" type="text" class="form-control" name="dataAdmissao" value="{{ old('dataAdmissao') }}" required autocomplete="dataAdmissao">
                        </div>
                    </div> <!--dataAdmissao-->
                </div>

            </div>
            </div>

            <div class="col col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Informações de Contato</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>
                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required autocomplete="endereco">
                            </div>
                        </div> <!--endereco-->

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>
                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required autocomplete="numero">
                            </div>
                        </div> <!--numero-->

                        <div class="form-group row">
                            <label for="complemento" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>
                            <div class="col-md-6">
                                <input id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" required autocomplete="complemento">
                            </div>
                        </div> <!--complemento-->

                        <div class="form-group row">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro">
                            </div>
                        </div> <!--bairro-->

                        <div class="form-group row">
                            <label for="CEP" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>
                            <div class="col-md-6">
                                <input id="CEP" type="text" class="form-control" name="CEP" value="{{ old('CEP') }}" required autocomplete="CEP">
                            </div>
                        </div> <!--CEP-->

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>
                            <div class="col-md-6">
                                <select id="estado" class="form-control" name="estado"
                                        onchange="javascript:carregarMunicipios(this);"
                                        onfocus="javascript:carregarMunicipios(this);">
                                </select>
                            </div>
                        </div> <!--estado-->

                        <div class="form-group row">
                            <label for="municipio_id" class="col-md-4 col-form-label text-md-right">Município</label>
                            <div class="col-md-6">
                                <select class="form-control" id="municipio_id" name="municipio_id">
                                </select>
                            </div>
                        </div> <!--municipio-->


                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone">
                            </div>
                        </div> <!--telefone-->

                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" required autocomplete="celular">
                            </div>
                        </div> <!--celular-->


                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="1" name="ativo" id="ativo">
                                    Usuário Ativo
                                </label>
                            </div>

                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="cadastro">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>



            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    function carregarEstados(){
        $.getJSON('api/estados', function (est) {
            console.log(est);
            console.log(est.length);
            for (i=0; i<est.length; i++){
                option = '<option value="' + est[i].id+ '">' + est[i].sigla+ '</option>';
                $('#estado').append(option);
            }
        })
    }

    function carregarMunicipios(estado){
        console.log(estado);
        $.getJSON('api/municipios/'+estado.value, function (mun) {
            console.log(mun);
            $('#municipio_id>option').remove();
            for (i=0; i<mun.length; i++){
                option = '<option value="' + mun[i].id+ '">' + mun[i].descricao+ '</option>';
                $('#municipio_id').append(option);
            }
        })
    }

    $(function(){
        carregarEstados();
    });

</script>
    @endsection





