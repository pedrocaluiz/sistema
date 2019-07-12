@extends('layouts.base', ["current" => "register"])

@section('header')
    @lang('messages.users')
@endsection

@section('title')
    @lang('messages.users')
@endsection

@push('css')
    <link href="{{asset('css/flat/_all.css')}}" rel="stylesheet">
    <style>
        .icheckbox_flat-blue {
            display: block;
        }
    </style>
@endpush

@section('content')
<div class="row align-items-end">
    <div class="col-md-12">
        <div class="box">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="cadastro">
                @csrf
            <div class="box-header">
                <h3 class="box-title">
                    @lang('messages.register')
                    @lang('messages.user')
                </h3>
            </div>
            <div class="box-body">
                    <fieldset>
                        <legend>@lang('messages.informations'):</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="primeiroNome">@lang('messages.name')</label>
                                <input id="primeiroNome" type="text" class="form-control @error('primeiroNome') is-invalid @enderror" name="primeiroNome" value="{{ old('primeiroNome') }}" required autofocus>
                                @error('primeiroNome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ultimoNome">@lang('messages.lastname')</label>
                                <input id="ultimoNome" type="text" class="form-control" name="ultimoNome" value="{{ old('ultimoNome') }}" required>
                                @error('ultimoNome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dataNascimento">@lang('messages.birthday')</label>
                                <input type="text" class="form-control pull-right datemask datepicker"  id="dataNascimento" name="dataNascimento" value="{{ old('dataNascimento') }}" placeholder="__/__/____" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="ativo">@lang('messages.enable')</label>
                                <!--<input type="hidden" name="ativo" value="0">-->
                                <input class="icheckbox_flat-blue" type="checkbox" name="ativo" value="1" checked disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email">@lang('messages.email')</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="password">@lang('messages.password')</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="password_confirmation">@lang('messages.confirmation')</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="perfil_id">@lang('messages.profile')</label>
                                <select class="form-control select2" id="perfil_id" name="perfil_id" disabled>
                                    @if(count($perfis) > 0)
                                        @foreach ($perfis as $perfil)
                                            @if ($perfil->descricao == "Aluno")
                                                <option value="{{$perfil->id}}" selected>{{$perfil->descricao}}</option>
                                            @else
                                                <option value="{{$perfil->id}}">{{$perfil->descricao}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dataAdmissao">@lang('messages.admission')</label>
                                <input type="text" class="form-control pull-right datepicker datemask" id="dataAdmissao" name="dataAdmissao" value="{{ old('dataAdmissao') }}" placeholder="__/__/____" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="agencia_id">@lang('messages.agency')</label>
                                <select class="form-control select2" id="agencia_id" name="agencia_id" autofocus>
                                    @if(count($agencias) > 0)
                                        @foreach ($agencias as $agencia)
                                            <option value="{{$agencia->id}}">{{$agencia->descricao}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cargo_id">@lang('messages.office')</label>
                                <select class="form-control select2" id="cargo_id" name="cargo_id">
                                    @if(count($cargos) > 0)
                                        @foreach ($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="funcao_id">@lang('messages.function')</label>
                                <select class="form-control select2" id="funcao_id" name="funcao_id">
                                    @if(count($funcoes) > 0)
                                        @foreach ($funcoes as $funcao)
                                            <option value="{{$funcao->id}}">{{$funcao->descricao}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="matricula">@lang('messages.enrolment')</label>
                                <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" placeholder="x999999-9" required >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="foto" class="rotulo">@lang('messages.image')</label>
                                <input type="file" class="form-control-file" id="foto" name="foto" >
                                <small id="fileHelp" class="form-text text-muted">Tamanho máximo 3MB.</small>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Dados de Contato:</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="endereco">@lang('messages.adress')</label>
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="numero">@lang('messages.number')</label>
                                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="complemento">@lang('messages.complement')</label>
                                <input id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="bairro">@lang('messages.neighborhood')</label>
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="estado">@lang('messages.state')</label>
                                <select id="estado" class="form-control select2" name="estado" onchange="javascript:carregarMunicipios(this);">
                                    @if(count($estados) > 0)
                                        @foreach ($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="municipio_id">@lang('messages.county')</label>
                                <select class="form-control select2" id="municipio_id" name="municipio_id">
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="CEP">@lang('messages.zip-code')</label>
                                <input id="CEP" type="text" class="form-control" name="CEP" value="{{ old('CEP') }}" placeholder="99.999-999" required >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="telefone">@lang('messages.phone-number')</label>
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="(99) 9999-9999" required  >

                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular">@lang('messages.cell-number')</label>
                                <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" placeholder="(99) 99999-9999" required >
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Documentos:</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="tipodoc">@lang('messages.type-doc')</label>
                                <select id="tipodoc" class="form-control select2" name="tipodoc">
                                    @if(count($tiposDoc) > 0)
                                        @foreach ($tiposDoc as $tipoDoc)
                                            <option value="{{$tipoDoc->id}}">{{$tipoDoc->descricao}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="numeroDocumento">@lang('messages.number')</label>
                                <input id="numeroDocumento" type="text" class="form-control" name="numeroDocumento" value="{{ old('numeroDocumento') }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="UF">@lang('messages.state')</label>
                                <select id="UF" class="form-control select2" name="UF">
                                    @if(count($estados) > 0)
                                        @foreach ($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </fieldset>

            </div>
            <div class="box-footer d-flex justify-content-center">
                <div class="col-md-2">
                <button type="submit" class="btn btn-primary botao" id="cadastro">
                    @lang('messages.register')
                </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('js/icheck.js')}}"></script>
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        /*function carregarEstados(){
            $.getJSON('api/estados', function (est) {
                console.log(est);
                console.log(est.length);
                for (i=0; i<est.length; i++){
                    option = '<option value="' + est[i].id+ '">' + est[i].sigla+ '</option>';
                    $('#estado').append(option);
                }
            })
        }

        function carregarUF(){
            $.getJSON('api/estados', function (est) {
                console.log(est);
                console.log(est.length);
                for (i=0; i<est.length; i++){
                    option = '<option value="' + est[i].id+ '">' + est[i].sigla+ '</option>';
                    $('#UF').append(option);
                }
            })
        }*/

        function carregarMunicipios(estado){
            console.log(estado);
            $.getJSON('/api/municipios/'+estado.value, function (mun) {
                console.log(mun);
                $('#municipio_id>option').remove();
                for (i=0; i<mun.length; i++){
                    option = '<option value="' + mun[i].id+ '">' + mun[i].descricao+ '</option>';
                    $('#municipio_id').append(option);
                }
            })
        }

        function carregarMunicipiosInicial(){
            $.getJSON('/api/municipios/1', function (mun) {
                console.log(mun);
                $('#municipio_id>option').remove();
                for (i=0; i<mun.length; i++){
                    option = '<option value="' + mun[i].id+ '">' + mun[i].descricao+ '</option>';
                    console.log(mun[i].descricao);
                    $('#municipio_id').append(option);
                }
            })
        }

        $(function(){
            carregarMunicipiosInicial();
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush





