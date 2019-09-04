@extends('layouts.base', ["current" => "cursos"])

@section('header')
    @lang('messages.course')
@endsection

@section('title')
    @lang('messages.course')
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
<div class="row align-items-end">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Activity</a></li>
            <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="activity">
                    <fieldset>
                            <legend>TO NO MENU1:</legend>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="ordem">@lang('messages.order')</label>
                                    <select class="form-control " id="ordem" name="ordem">
                                            <option value="1">1</option>
                                            <!--add Mais <option> quando add mais Unidades-->
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tituloUnidades">@lang('messages.title')</label>
                                    <input id="tituloUnidades" type="text" class="form-control" name="tituloUnidades[]" value="{{ old('tituloUnidade') }}" required>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset >
                            <legend>@lang('messages.informations'):</legend>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="tipoMat_id">@lang('messages.type-mat')</label>
                                    <select class="form-control " id="tipoMat_id" name="tipoMat_id[]">
                                        @if(count($tiposMat) > 0)
                                            @foreach ($tiposMat as $tipoMat)
                                                <option value="{{$tipoMat->id}}">{{$tipoMat->descricao}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="descricaoMaterial">@lang('messages.description')</label>
                                    <input id="descricaoMaterial" type="text" class="form-control" name="descricaoMaterial[]" value="{{ old('descricaoMaterial') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="storage">@lang('messages.source')</label>
                                    <select class="form-control " id="storage" name="storage[]" onchange="local(this)">
                                        <option value="1">Local</option>
                                        <option value="0">Web</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4" id="URL">
                                    <!--add required no que for ser usado, remover do outro-->
                                    <!--#pathMaterial { display: none; }-->
                                    <label class="pathMaterial" for="pathMaterial">Caminho</label>
                                    <input id="pathMaterial" type="file" class="form-control-file pathMaterial" name="pathMaterial[]">
                                    <small id="fileHelp" class="form-text text-muted pathMaterial">Tamanho máximo 20MB.</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-primary botao" id="newkeyword">
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp;{{__('Material')}}
                                    </button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset id="respostas">
                            <legend>@lang('messages.informations'):</legend>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="questao">@lang('messages.question')</label>
                                    <textarea rows="2" cols="50" name="questoes[]" id="questao" class="form-control" required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="imagem">@lang('messages.image')</label>
                                    <input id="imagem" type="file" class="form-control-file" name="imagem[]" >
                                        <small id="fileHelp" class="form-text text-muted">Tamanho máximo 20MB.</small>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="correta">@lang('messages.right-answer')</label>
                                    <textarea rows="2" cols="50" name="correta[]" id="correta" class="form-control" required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                    <hr class="my-4">
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control" required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>

                            <!--<div hidden class="row">
                                <div class="form-group col-md-6"></div>
                                <div class="form-group col-md-2"></div>
                            </div>-->
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <button type="button" id="btnResp" class="btn btn-primary botao" id="newkeyword">
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.answer')
                                    </button>
                                </div>
                            </div>
                        </fieldset>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="timeline">
                    <fieldset>
                            <legend>TO NO MENU2:</legend>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="ordem">@lang('messages.order')</label>
                                    <select class="form-control select2" id="ordem" name="ordem">
                                            <option value="1">1</option>
                                            <!--add Mais <option> quando add mais Unidades-->
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tituloUnidades">@lang('messages.title')</label>
                                    <input id="tituloUnidades" type="text" class="form-control" name="tituloUnidades[]" value="{{ old('tituloUnidade') }}" required>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset >
                            <legend>@lang('messages.informations'):</legend>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="tipoMat_id">@lang('messages.type-mat')</label>
                                    <select class="form-control " id="tipoMat_id" name="tipoMat_id[]">
                                        @if(count($tiposMat) > 0)
                                            @foreach ($tiposMat as $tipoMat)
                                                <option value="{{$tipoMat->id}}">{{$tipoMat->descricao}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="descricaoMaterial">@lang('messages.description')</label>
                                    <input id="descricaoMaterial" type="text" class="form-control" name="descricaoMaterial[]" value="{{ old('descricaoMaterial') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="storage">@lang('messages.source')</label>
                                    <select class="form-control " id="storage" name="storage[]" onchange="local(this)">
                                        <option value="1">Local</option>
                                        <option value="0">Web</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4" id="URL">
                                    <!--add required no que for ser usado, remover do outro-->
                                    <!--#pathMaterial { display: none; }-->
                                    <label class="pathMaterial" for="pathMaterial">Caminho</label>
                                    <input id="pathMaterial" type="file" class="form-control-file pathMaterial" name="pathMaterial[]">
                                    <small id="fileHelp" class="form-text text-muted pathMaterial">Tamanho máximo 20MB.</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-primary botao" id="newkeyword">
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp;{{__('Material')}}
                                    </button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset id="respostas">
                            <legend>@lang('messages.informations'):</legend>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="questao">@lang('messages.question')</label>
                                    <textarea rows="2" cols="50" name="questoes[]" id="questao" class="form-control" required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="imagem">@lang('messages.image')</label>
                                    <input id="imagem" type="file" class="form-control-file" name="imagem[]" >
                                        <small id="fileHelp" class="form-text text-muted">Tamanho máximo 20MB.</small>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="correta">@lang('messages.right-answer')</label>
                                    <textarea rows="2" cols="50" name="correta[]" id="correta" class="form-control" required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                    <hr class="my-4">
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control" required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="incorreta">@lang('messages.wrong-answer')</label>
                                    <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">
                                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                                    </textarea>
                                </div>
                            </div>

                            <!--<div hidden class="row">
                                <div class="form-group col-md-6"></div>
                                <div class="form-group col-md-2"></div>
                            </div>-->
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <button type="button" id="btnResp" class="btn btn-primary botao" id="newkeyword">
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.answer')
                                    </button>
                                </div>
                            </div>
                        </fieldset>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        var a = 0;

        $("#btnResp").click(function(){
            $("#respostas").append(
                    '<div class="row" id="'+a+'">\n    <div class="form-group col-md-6">\n        <label for="incorreta">Mensagem Incorreta</label>\n        <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical">\n            Nova Resposta Incorreta\n        </textarea>\n    </div>\n    <div class="form-group col-md-1">\n        <button type="button" class="btn btn-primary botao novo" id="'+a+'" style="margin-top: 25px;" onclick="remover(this)">\n            <i class="fa fa-trash"></i>\n        </button>\n    </div>\n</div>'
            );
            a = a+1;
        });

        function remover(botao){
            //console.log(botao.id);
            var seletor = 'div#' + botao.id;
            //console.log($(seletor));
            $(seletor).remove();
        }


        $("#newkeyword").click(function(){
            txtArea = $("#palavrasChave");
            txtAreaI = $("#palavrasChave-i");
            if (txtAreaI.val() == ""){
                alert("Digite alguma palavra-chave");
            }else if (txtAreaI.val().length < 3){
                //console.log(txtAreaI.val().length);
                alert("Digite no mínimo 3 caracteres");
            }else {
                txtArea.text(txtArea.text() + txtAreaI.val() + ';');
                txtAreaI.val("");
            }
        });

        function local(option){
            opt = option.value;
            console.log(opt);
            if (opt == 0){
                $(".pathMaterial").remove();
                $("#URL").append(
                        '<label class="urlMaterial" for="urlMaterial">URL</label>\n<input id="urlMaterial" type="text" class="form-control urlMaterial" name="urlMaterial[]" required>'
                );
            }else {
                $(".urlMaterial").remove();
                $("#URL").append(
                        '<label class="pathMaterial" for="pathMaterial">Caminho</label>\n<input id="pathMaterial" type="file" class="form-control-file pathMaterial" name="pathMaterial[]">\n<small id="fileHelp" class="form-text text-muted pathMaterial">Tamanho máximo 20MB.</small>'
                );
            }
        }


        // Actual addTab function: adds new tab using the input from the form above
        function addTab() {
            var label = tabTitle.val() || "Tab " + tabCounter,
                    id = "tabs-" + tabCounter,
                    li = $( tabTemplate.replace( /#\{href\}/g, "#" + id ).replace( /#\{label\}/g, label ) ),
                    tabContentHtml = tabContent.val() || "Tab " + tabCounter + " content.";

            tabs.find( ".ui-tabs-nav" ).append( li );
            tabs.append( "<div id='" + id + "'><p>" + tabContentHtml + "</p></div>" );
            tabs.tabs( "refresh" );
            tabCounter++;
        }





        $(function(){
            $( "#tabs" ).tabs();
        });
    </script>
@endpush
