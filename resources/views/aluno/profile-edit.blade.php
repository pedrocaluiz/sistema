@extends('layouts.base', ["current" => "meu-perfil"])

@section('header')
    @lang('messages.user')
@endsection

@section('title')
    @lang('messages.user')
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
        <form method="POST" action="/usuarios/{{$user->id}}" enctype="multipart/form-data" class="cadastro">
            @method('PUT')
            @csrf
            <div class="box-header">
                <h3 class="box-title">
                    @lang('messages.edit')
                    @lang('messages.user')
                </h3>
            </div>
            <div class="box-body">
                    <fieldset>
                        <legend>@lang('messages.informations'):</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="primeiroNome">@lang('messages.name')</label>
                                <input id="primeiroNome" type="text" class="form-control @error('primeiroNome') is-invalid @enderror"
                                       name="primeiroNome" value="{{ $user->primeiroNome }}" placeholder="{{ $user->primeiroNome }}" required autofocus>
                                @error('primeiroNome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ultimoNome">@lang('messages.lastname')</label>
                                <input id="ultimoNome" type="text" class="form-control"
                                       name="ultimoNome" value="{{ $user->ultimoNome }}" placeholder="{{ $user->ultimoNome }}" required>
                                @error('ultimoNome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dataNascimento">@lang('messages.birthday')</label>
                                <input type="text" class="form-control pull-right datemask datepicker"  id="dataNascimento"
                                       name="dataNascimento" placeholder="__/__/____" >
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $user->email }}" placeholder="{{ $user->email }}" required autocomplete="email" disabled>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="password">@lang('messages.password')</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="password_confirmation">@lang('messages.confirmation')</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="perfil_id">@lang('messages.profile')</label>
                                <select class="form-control select2" id="perfil_id" name="perfil_id" disabled>
                                    @if(count($perfis) > 0)
                                        @foreach ($perfis as $p)
                                            @if ($p->id == $user->perfil->first()->id)
                                                <option value="{{$p->id}}" selected>{{$p->descricao}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dataAdmissao">@lang('messages.admission')</label>
                                <input type="text" class="form-control pull-right datepicker datemask" id="dataAdmissao"
                                       name="dataAdmissao" placeholder="__/__/____" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="agencia_id">@lang('messages.agency')</label>
                                <select class="form-control select2" id="agencia_id" name="agencia_id" autofocus>
                                    @if(count($agencias) > 0)
                                        @foreach ($agencias as $agencia)
                                            @if ($agencia->id == $user->agencia_id)
                                                <option value="{{$agencia->id}}" selected>{{$agencia->descricao}}</option>
                                            @else
                                                <option value="{{$agencia->id}}">{{$agencia->descricao}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cargo_id">@lang('messages.office')</label>
                                <select class="form-control select2" id="cargo_id" name="cargo_id">
                                    @if(count($cargos) > 0)
                                        @foreach ($cargos as $cargo)
                                            @if ($cargo->id == $user->cargo_id)
                                                <option value="{{$cargo->id}}" selected>{{$cargo->descricao}}</option>
                                            @else
                                                <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="funcao_id">@lang('messages.function')</label>
                                <select class="form-control select2" id="funcao_id" name="funcao_id">
                                    @if(count($funcoes) > 0)
                                        @foreach ($funcoes as $funcao)
                                            @if ($funcao->id == $user->funcao_id)
                                                <option value="{{$funcao->id}}" selected>{{$funcao->descricao}}</option>
                                            @else
                                                <option value="{{$funcao->id}}">{{$funcao->descricao}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="matricula">@lang('messages.enrolment')</label>
                                <input id="matricula" type="text" class="form-control"
                                       name="matricula" value="{{ $user->matricula }}" placeholder="x999999-9" required >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="foto" class="rotulo">@lang('messages.image')</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                                <small id="fileHelp" class="form-text text-muted">Tamanho máximo 3MB.</small>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Dados de Contato:</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="endereco">@lang('messages.adress')</label>
                                <input id="endereco" type="text" class="form-control" name="endereco"
                                       value="{{ $user->endereco }}" placeholder="{{ $user->endereco }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="numero">@lang('messages.number')</label>
                                <input id="numero" type="text" class="form-control" name="numero"
                                       value="{{ $user->numero }}" placeholder="{{ $user->numero }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="complemento">@lang('messages.complement')</label>
                                <input id="complemento" type="text" class="form-control" name="complemento"
                                       value="{{ $user->complemento }}" placeholder="{{ $user->complemento }}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="bairro">@lang('messages.neighborhood')</label>
                                <input id="bairro" type="text" class="form-control" name="bairro"
                                       value="{{ $user->bairro }}" placeholder="{{ $user->bairro }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="estado">@lang('messages.state')</label>
                                <select id="estado" class="form-control select2" name="estado" onchange="carregarMunicipios(this);">
                                    @if(count($estados) > 0)
                                        @foreach ($estados as $e)
                                            @if ($e->id == $estado->id)
                                                <option value="{{$e->id}}" selected>{{$e->sigla}}</option>
                                            @else
                                                <option value="{{$e->id}}">{{$e->sigla}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" id="cidade" value="{{$municipio->id}}">
                                <label for="municipio_id">@lang('messages.county')</label>
                                <select class="form-control select2" id="municipio_id" name="municipio_id">
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="CEP">@lang('messages.zip-code')</label>
                                <input id="CEP" type="text" class="form-control" name="CEP"
                                       value="{{ $user->CEP }}"  placeholder="99.999-999" required >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="telefone">@lang('messages.phone-number')</label>
                                <input id="telefone" type="text" class="form-control" name="telefone"
                                       value="{{ $user->telefone }}" placeholder="(99) 9999-9999" required  >

                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular">@lang('messages.cell-number')</label>
                                <input id="celular" type="text" class="form-control" name="celular"
                                       value="{{ $user->celular }}" placeholder="(99) 99999-9999" required >
                            </div>
                        </div>
                    </fieldset>

                    {{--<fieldset>
                        <legend>Documentos:</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="tipodoc">@lang('messages.type-doc')</label>
                                <select id="tipodoc" class="form-control select2" name="tipodoc">
                                    @if(count($tiposDoc) > 0)
                                        @foreach ($tiposDoc as $tipoDoc)
                                            @if ($funcao->id == $user->funcao_id)
                                                <option value="{{$tipoDoc->id}}">{{$tipoDoc->descricao}}</option>
                                            @else

                                            @endif

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
                    </fieldset>--}}

            </div>
            <div class="box-footer d-flex justify-content-center">
                <div class="col-md-2">
                <button type="submit" class="btn btn-primary botao" id="cadastro">
                    @lang('messages.update')
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

        function carregarMunicipios(estado){
            console.log(estado);
            $.getJSON('/api/municipios/'+estado.value, function (mun) {
                console.log(mun);
                $('#municipio_id>option').remove();
                for (i=0; i<mun.length; i++){
                    option = '<option value="' + mun[i].id+ '">' + mun[i].descricao+ '</option>';
                    $('#municipio_id').append(option);
                }
                var cidade = $('#cidade').val();
                var selectMunicipio = $('#municipio_id')
                selectMunicipio.val(cidade);
                selectMunicipio.select2().trigger('change');

            })
        }

        $(function(){
            carregarMunicipios($("#estado")[0]);
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush





