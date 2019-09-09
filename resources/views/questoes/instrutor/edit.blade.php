@extends('layouts.base', ["current" => "questoes"])

@section('header')
  @lang('messages.questions')
@endsection

@section('title')
    <a href="{{route('questoes')}}"> @lang('messages.questions')</a>
@endsection

@push('css')
  <style>

  </style>
@endpush

@section('content')
  <form method="POST" action="/questoes/{{$questao->id}}" enctype="multipart/form-data" class="cadastro">
    @method('PUT')
    @csrf
    <div class="row align-items-end">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.question')
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="unidade_id">@lang('messages.unity')</label>
                  <select class="form-control " id="unidade_id" name="unidade_id" required>
                      <option value="" disabled selected>SELECIONE</option>
                    @if(count($unidades) > 0)
                      @foreach ($unidades as $unidade)
                        @if ($unidade->id == $questao->unidade_id)
                          <option value="{{$unidade->id}}" selected>{{$unidade->titulo}}</option>
                        @else
                          <option value="{{$unidade->id}}">{{$unidade->titulo}}</option>
                        @endif
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>
            </fieldset>
            <fieldset id="respostas">
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-8">
                  <label for="questao">@lang('messages.question')</label>
                  <textarea rows="2" cols="50" name="questao" id="questao" class="form-control" required maxlength="500" style="resize: vertical"
                      placeholder="{{$questao->questao}}">{{$questao->questao}}</textarea>
                </div>
                <div class="form-group col-md-3">
                  <label for="imagem">Imagem</label>
                  <input id="imagem" type="file" class="form-control-file" name="imagem" >
                  <small id="fileHelp" class="form-text text-muted">Tamanho máximo 20MB.</small>
                </div>
              </div>
              <hr class="my-4">
              <div class="row">
                <div class="form-group col-md-9">
                  <label for="correta">@lang('messages.right-answer')</label>
                  <input type="hidden" name="correta_id" value="{{$respCorreta->first()->id}}">
                  <textarea rows="2" cols="50" name="correta" id="correta" class="form-control" required maxlength="500" style="resize: vertical"
                      placeholder="{{$respCorreta->first()->resposta}}">{{$respCorreta->first()->resposta}}</textarea>
                  <hr class="my-4">
                </div>
              </div>

              @isset($respostas)
                @foreach($respostas->whereNotIn('id', [$questao->respCorreta_id]) as $resposta)
                  <div class="row resp" id="{{$loop->iteration}}">
                    <div class="form-group col-md-9">
                      <input type="hidden" name="incorretas_id[]" value="{{$resposta->id}}">
                      <label for="incorreta">@lang('messages.wrong-answer')</label>
                      <textarea id="incorreta" rows="2" cols="50" name="incorretas[]" class="form-control" required maxlength="500" style="resize: vertical"
                          placeholder="{{$resposta->resposta}}">{{$resposta->resposta}} </textarea>
                    </div>
                    <div class="form-group col-md-1">
                      <button type="button" value="{{$resposta->id}}" class="btn btn-danger botao novo" id="{{$loop->iteration}}" style="margin-top: 25px;" onclick="remover(this)">
                        <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </div>
                @endforeach
              @endif




              <!--<div hidden class="row">
                  <div class="form-group col-md-6"></div>
                  <div class="form-group col-md-2"></div>
              </div>-->

            </fieldset>
              <div class="row">
                  <div class="form-group col-md-1">
                      <button type="button" id="btnResp" class="btn btn-primary botao">
                          <i class="fa fa-plus"></i>
                      </button>
                  </div>
              </div>

            </div>
          <div class="box-footer">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary botao" id="cadastro">
                @lang('messages.update')
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
          if (botao.value > 0) {
              console.log(botao.value);
              apagar(botao.value);
          }

          var seletor = 'div#' + botao.id;
          $(seletor).remove();
      }

      function apagar(id){
          $.ajax({
              type: "DELETE",
              url: "/api/respostas/" + id,
              context: this,
              success: function(resp){
                  console.log("Resposta incorreta id: " + resp + " excluída com sucesso");
              },
              error: function(error){
                  console.log(error);
              }
          });
      }

      $(function(){
          $("#btnResp").click(function(){
              var a = parseInt($("#respostas>.resp:last").attr('id')) + 1;
              console.log(a);
              $("#respostas").append(
                  `<div class="row resp" id="${a}">
                  <div class="form-group col-md-9">
                      <label for="incorreta">@lang('messages.wrong-answer')</label>
                      <textarea id="incorreta" rows="2" cols="50" name="novas_incorretas[]" placeholder="Digite uma Resposta Incorreta" class="form-control"  required maxlength="500" style="resize: vertical"></textarea>
                  </div>
                  <div class="form-group col-md-1">
                      <button type="button" class="btn btn-danger botao novo" id="${a}" style="margin-top: 25px;" onclick="remover(this)">
                          <i class="fa fa-trash"></i>
                      </button>
                  </div>
              </div>`
              );
          });
      });
  </script>
@endpush
