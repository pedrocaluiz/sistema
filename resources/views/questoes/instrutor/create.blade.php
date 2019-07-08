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
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.register')
              @lang('messages.question')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="curso_id">@lang('messages.course')</label>
                  <select class="form-control select2" id="curso_id" name="curso_id" onchange="carregarUnidades(this)" >
                    @if(count($cursos) > 0)
                      @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="unidade_id">@lang('messages.unity')</label>
                  <select class="form-control select2" id="unidade_id" name="unidade_id"></select>
                </div>
              </div>
            </fieldset>
            <fieldset id="respostas">
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="questao">@lang('messages.question')</label>
                  <textarea rows="2" cols="50" name="questao" id="questao" class="form-control" required maxlength="500" style="resize: vertical">
                          At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
                  </textarea>
                </div>
                <div class="form-group col-md-3">
                  <label for="imagem">@lang('messages.image')</label>
                  <input id="imagem" type="file" class="form-control-file" name="imagem" >
                  <small id="fileHelp" class="form-text text-muted">Tamanho máximo 20MB.</small>
                </div>
              </div>
              <hr class="my-4">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="correta">@lang('messages.right-answer')</label>
                  <textarea rows="2" cols="50" name="correta" id="correta" class="form-control" required maxlength="500" style="resize: vertical">
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
                <div class="form-group col-md-1">
                  <button type="button" id="btnResp" class="btn btn-primary botao">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
            </fieldset>

            </div>
          <div class="box-footer">
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

      var a = 0;

      $("#btnResp").click(function(){
          $("#respostas").append(
              `<div class="row" id="${a}">
                  <div class="form-group col-md-6">
                      <label for="incorreta">@lang('messages.wrong-answer')</label>
                      <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control"  required maxlength="500" style="resize: vertical"></textarea>
                  </div>
                  <div class="form-group col-md-1">
                      <button type="button" class="btn btn-primary botao novo" id="${a}" style="margin-top: 25px;" onclick="remover(this)">
                          <i class="fa fa-trash"></i>
                      </button>
                  </div>
              </div>`
          );
          a = a+1;
      });

      function remover(botao){
          var seletor = 'div#' + botao.id;
          $(seletor).remove();
      }

      function carregarUnidades(curso){
          $.getJSON('/api/unidades/'+curso.value, function (unidade) {
              /*console.log(curso);
              console.log(curso.value);
              console.log($('#curso_id')[0]);
              console.log($('#curso_id')[0].value);*/
              $('#unidade_id>option').remove();
              console.log(unidade);
              for (i=0; i<unidade.length; i++){
                  option = '<option value="' + unidade[i].id+ '">' + unidade[i].titulo +'</option>';
                  //console.log(unidade[i].titulo);
                  $('#unidade_id').append(option);
              }
          })
      }

      $(function(){
          carregarUnidades($('#curso_id')[0]);
      });
  </script>
@endpush
