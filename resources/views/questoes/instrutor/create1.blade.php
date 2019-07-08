@extends('layouts.base', ["current" => "questoes"])

@section('header')
  @lang('messages.questions')
@endsection

@section('title')
  @lang('messages.questions')
@endsection

@push('css')
  <style>

  </style>
@endpush

@section('content')
  <form method="POST" action="{{ route('questoes.instrutor.store') }}" enctype="multipart/form-data" class="cadastro">
    @csrf

    <div class="row align-items-end">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#unidade1" data-toggle="tab" aria-expanded="true">Unidade 1</a></li>
            <li><a href="#unidade2" data-toggle="tab">Unidade 2</a></li>
            <li><a href="#unidade3" data-toggle="tab">Unidade 3</a></li>
            <li><a href="#unidade4" data-toggle="tab">Unidade 4</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="unidade1">


              <fieldset>
                <legend>@lang('messages.informations'):</legend>
                <div class="row">
                  <div class="form-group col-md-2">
                    <label for="tipoMat_id">@lang('messages.type-mat')</label>
                    <select class="form-control select2" id="tipoMat_id" name="tipoMat_id[]">
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
                    <select class="form-control select2" id="storage" name="storage[]" onchange="local(this)">
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

      $(function(){
          //
      });
  </script>
@endpush
