@extends('layouts.base')

@section('content')

    <div class="row align-items-end">
        <div class="col-md-12">
            <div class="box">


                <div class="box-header">
                    <h3 class="box-title">Lista de Cargos</h3>
                </div>

                <div class="box-body">

                <form method="POST" action="{{ route('register') }}" class="cadastro">
                @csrf


                            <div class="input-group">
                                <label class="rotulo" for="primeiroNome">{{ __('Nome') }}</label>
                                <input id="primeiroNome" type="text" class="form-control @error('primeiroNome') is-invalid @enderror" name="primeiroNome" value="{{ old('primeiroNome') }}" required autocomplete="primeiroNome" autofocus>
                                    @error('primeiroNome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="input-group">
                                <label class="rotulo" for="ultimoNome" class="">{{ __('Sobrenome') }}</label>
                                <input id="ultimoNome" type="text" class="form-control" name="ultimoNome" value="{{ old('ultimoNome') }}" required autocomplete="ultimoNome">
                                @error('ultimoNome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group w-20">
                                    <label class="rotulo" for="email" class="">{{ __('E-Mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>



                            <div class="input-group">
                                <label for="password" class="rotulo">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> <!--password-->

                            <div class="input-group">
                                <label for="password-confirm" class="rotulo">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div> <!--password conf-->

                            <div class="input-group w-10">
                                <label for="foto" class="rotulo">{{ __('Foto') }}</label>

                                    <input id="foto" type="text" class="form-control" name="foto" value="{{ old('foto') }}" required autocomplete="foto">

                            </div> <!--foto-->

                            <div class="input-group w-20">
                                <label for="cargo_id" class="rotulo">{{ __('Cargo') }}</label>

                                    <select class="form-control" id="cargo_id" name="cargo_id" required >
                                     @foreach ($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                                        @endforeach
                                    </select>

                            </div><!--cargo-->


                            <div class="input-group w-20">
                                <label for="funcao_id" class="rotulo">{{ __('Função') }}</label>

                                    <select class="form-control" id="funcao_id" name="funcao_id" required >
                                     @foreach ($funcoes as $funcao)
                                            <option value="{{$funcao->id}}">{{$funcao->descricao}}</option>
                                        @endforeach
                                    </select>

                            </div> <!--funcao-->

                            <div class="input-group w-20">
                                <label for="agencia_id" class="rotulo">{{ __('Agência') }}</label>

                                    <select class="form-control" id="agencia_id" name="agencia_id" required >
                                     @foreach ($agencias as $agencia)
                                            <option value="{{$agencia->id}}">{{$agencia->descricao}}</option>
                                        @endforeach
                                    </select>

                            </div> <!--agencia-->

                            <div class="input-group w-10">
                                <label for="dataNascimento" class="rotulo">{{ __('Data Nascimento') }}</label>

                                    <input id="dataNascimento" type="text" class="form-control" name="dataNascimento" value="{{ old('dataNascimento') }}" required autocomplete="dataNascimento">

                            </div> <!--dataNascimento-->

                            <div class="input-group w-10">
                                <label for="matricula" class="rotulo">{{ __('Matrícula') }}</label>

                                    <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula">

                            </div> <!--matricula-->

                            <div class="input-group w-10">
                                <label for="dataAdmissao" class="rotulo">{{ __('Data Admissão') }}</label>
                                <input type="text" class="form-control pull-right" id="datepicker" name="dataAdmissao" value="{{ old('dataAdmissao') }}" required autocomplete="dataAdmissao">
                            </div>

                            <!--dataAdmissao-->







                        <div class="input-group">
                            <label for="endereco" class="rotulo">{{ __('Endereço') }}</label>
                            <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required autocomplete="endereco">
                        </div> <!--endereco-->

                        <div class="input-group">
                            <label for="numero" class="rotulo">{{ __('Número') }}</label>
                            <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required autocomplete="numero">
                        </div> <!--numero-->

                            <div class="input-group">
                                <label for="complemento" class="rotulo">{{ __('Complemento') }}</label>
                                <input id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" required autocomplete="complemento">
                            </div> <!--complemento-->

                            <div class="input-group">
                                <label for="bairro" class="rotulo">{{ __('Bairro') }}</label>
                                    <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro">
                            </div> <!--bairro-->


                            <div class="input-group">
                                <label for="CEP" class="rotulo">{{ __('CEP') }}</label>

                                    <input id="CEP" type="text" class="form-control" name="CEP" value="{{ old('CEP') }}" required autocomplete="CEP">

                            </div><!--CEP-->

                            <div class="input-group">
                                <label for="estado" class="rotulo">Estado</label>

                                    <select id="estado" class="form-control" name="estado"
                                         onchange="carregarMunicipios(this);">
                                    </select>

                            </div> <!--estado-->

                            <div class="input-group">
                                <label for="municipio_id" class="rotulo">Município</label>

                                    <select class="form-control" id="municipio_id" name="municipio_id"></select>

                            </div> <!--municipio-->


                            <div class="input-group">
                                <label for="telefone" class="rotulo">{{ __('Telefone') }}</label>

                                    <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone">

                            </div> <!--telefone-->

                            <div class="input-group">
                                <label for="celular" class="rotulo">{{ __('Celular') }}</label>

                                    <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" required autocomplete="celular">

                            </div> <!--celular-->


                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="1" name="ativo" id="ativo">
                                    Usuário Ativo
                                </label>
                            </div>



                </form>
                </div>
            </div>
        </div>
    </div>





                    <!--<div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Escolha uma foto</label>
                    </div>-->







                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="cadastro">
                            {{ __('Cadastrar') }}
                        </button>
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

    function carregarMunicipiosInicial(){
        $.getJSON('api/municipios/1', function (mun) {
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
        carregarMunicipiosInicial();
    });

</script>
@endsection





