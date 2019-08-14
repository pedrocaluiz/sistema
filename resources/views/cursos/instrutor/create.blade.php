@extends('layouts.base', ["current" => "cursos", "menu" => "cadastrar" ])

@section('header')
    @lang('messages.course')
@endsection

@section('title')
    <a href="{{route('cursos')}}"> @lang('messages.courses')</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('cursos.store') }}" enctype="multipart/form-data" class="cadastro">
        @csrf
<div class="row align-items-end">
    <div class="col-md-12">
        <div class="box">

            <div class="box-header">
                <h3 class="box-title">
                    @lang('messages.register')
                    @lang('messages.course')
                </h3>
            </div>
            <div class="box-body">
                <fieldset>
                    <legend>@lang('messages.informations'):</legend>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="categoria_id">@lang('messages.categories')</label>
                            <select class="form-control select2" id="categoria_id" name="categoria_id" autofocus>
                                @if(count($cats) > 0)
                                    @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="tituloCurso">@lang('messages.title')</label>
                            <input id="tituloCurso" type="text" class="form-control" name="tituloCurso" value="{{ old('tituloCurso') }}" required autofocus minlength="3" maxlength="60">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="descricaoCurso">@lang('messages.description')</label>
                            <textarea rows="2" cols="50" name="descricaoCurso" id="descricaoCurso" class="form-control" required maxlength="500" style="resize: vertical"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="icone">@lang('messages.icon')</label>
                            <input type="text" class="form-control icp icp-auto"  id="icone"
                                   name="icone" value="{{ old('icone') }}" placeholder="Ex: fa fa-chrome" required minlength="8" maxlength="60">
                            <small id="fileHelp" class="form-text text-muted"> Para mais ícones <a href="{{asset('AdminLTE/pages/UI/icons.html')}}" target="_blank">aqui.</a> </small>
                            <p><small id="fileHelp" class="form-text">Necessário incluir a classe "fa" ou "glyphicon" no início.</small></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="palavrasChave-i"> Palavra-Chave</label>
                            <input id="palavrasChave-i" type="text" class="form-control" name="palavrasChave-i" minlength="3" maxlength="30">
                        </div>
                        <div class="form-group col-md-1">
                            <!--<label for="newkeyword">Adicionar</label>-->
                            <button type="button" class="btn btn-primary" id="newkeyword" style="margin-top: 25px">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-danger" id="deletekeyword" style="margin-top: 25px">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="palavrasChave">@lang('messages.keywords')</label>
                            <textarea rows="2" cols="50" name="palavrasChave" id="palavrasChave" class="form-control" readonly maxlength="500" style="resize: vertical"></textarea>
                            <!--add PalavrasChave-->
                        </div>
                    </div>
                    <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
                </fieldset>

                <div id="tabs" class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab"><i class="fa fa-plus" id="fa-plus"></i></a></li>
                        <li class="active"><a href="#unidade1" data-toggle="tab" aria-expanded="true">Unidade1</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="unidade1">
                            <fieldset>
                            <legend>@lang('messages.informations'):</legend>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="ordem">@lang('messages.order')</label>
                                        <input id="ordem" type="text" class="form-control ordem" name="ordem[]" required minlength="1" maxlength="2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tituloUnidades">@lang('messages.title')</label>
                                        <input id="tituloUnidades" type="text" class="form-control" name="tituloUnidades[]" required minlength="3" maxlength="60">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>


            </div>
            <div class="box-footer d-flex justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary botao" id="cadastro">
                        @lang('messages.register')
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
</form>
@endsection

@push('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function remover(botao){
            var seletorLi = 'li#' + botao.id;
            var seletorDiv = 'div#unidade' + botao.id;
            $(seletorLi).remove();
            $(seletorDiv).remove();
            $("div#unidade1").addClass('active');
            $("a#ui-id-1").click();
        }

        $(function(){
            $("#tabs").tabs();

            $("#newkeyword").click(function(){
                txtArea = $("#palavrasChave");
                txtAreaI = $("#palavrasChave-i");
                if (txtAreaI.val() == ""){
                    alert("Digite alguma palavra-chave");
                }else if (txtAreaI.val().length < 3){
                    //console.log(txtAreaI.val().length);
                    alert("Digite no mínimo 3 caracteres");
                }else {
                    txtArea.val(txtArea.val() + txtAreaI.val() + ';');
                    txtAreaI.val("");
                }
            });

            $("#deletekeyword").click(function(){
                txtArea = $("#palavrasChave");
                txtArea.val('');
            });

            var a = 2;

            $("#fa-plus").click(function(){
                $(".nav-tabs").append(
                        '<li id="'+a+'"><a href="#unidade'+a+'" data-toggle="tab" id="ui-id-'+a+'">Unidade'+a+'</a></li>'
                );
                $(".tab-content").append(
                        `<div class="tab-pane" id="unidade${a}">
                        <fieldset>
                        <legend>@lang('messages.informations'):</legend>
                            <div class="row">
                                <div class="form-group col-md-2">
                                  <label for="ordem">@lang('messages.order')</label>
                                  <input id="ordem" type="text" class="form-control ordem" name="ordem[]" required minlength="1" maxlength="2">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tituloUnidades">@lang('messages.title')</label>
                                        <input id="tituloUnidades" type="text" class="form-control" name="tituloUnidades[]" required minlength="3" maxlength="60">
                                    </div>
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-primary botao" id="${a}" style="margin-top: 25px;" onclick="remover(this)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>`
                );
                $(".ordem").mask("90");

                a = a+1;
            });
        });
    </script>
@endpush
