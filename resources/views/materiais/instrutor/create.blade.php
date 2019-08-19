@extends('layouts.base', ["current" => "materiais", "menu" => "cadastrar"])

@section('header')
  @lang('messages.materials')
@endsection

@section('title')
    <a href="{{route('materiais')}}"> @lang('messages.materials')</a>
@endsection

@push('css')
  <style>

  </style>
@endpush

@section('content')
  <form method="POST" action="{{ route('materiais.store') }}" enctype="multipart/form-data" class="cadastro">
    @csrf
    <div class="row align-items-end">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.register')
              @lang('messages.material')
            </h3>
          </div>
          <div class="box-body">
            <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
          <fieldset>
          <legend>@lang('messages.informations'):</legend>
            <div class="row">
              <div class="form-group col-md-3">
                <label for="curso_id">@lang('messages.course')</label>
                <select class="form-control select2" id="curso_id" name="curso_id" onchange="carregarUnidades(this)" required>
                    <option value="" disabled selected></option>
                  @if(count($cursos) > 0)
                    @foreach ($cursos as $curso)
                      <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="unidade_id">@lang('messages.unity')</label>
                <select class="form-control select2" id="unidade_id" name="unidade_id" onchange="carregarMateriais(this)" required>
                    <option></option>
                </select>
              </div>
            </div>
          </fieldset>
            <div id="tabs" class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li><a data-toggle="tab"><i class="fa fa-plus"></i></a></li>
                <li class="active"><a href="#material1" data-toggle="tab" aria-expanded="true">Material1</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="material1">
                  <fieldset>
                    <legend>@lang('messages.informations'):</legend>
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="ordem">@lang('messages.order')</label>
                        <input id="ordem" type="text" class="form-control ordem" name="ordem[]" required minlength="1" maxlength="2">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="tipoMat_id">@lang('messages.type-mat')</label>
                        <select class="form-control" id="tipoMat_id" name="tipoMat_id[]">
                          @if(count($tiposMat) > 0)
                            @foreach ($tiposMat as $tipoMat)
                              <option value="{{$tipoMat->id}}">{{$tipoMat->descricao}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="descricaoMaterial">@lang('messages.description')</label>
                        <input id="descricaoMaterial" type="text" class="form-control" name="descricaoMaterial[]" required minlength="3" maxlength="60">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="storage1">@lang('messages.source')</label>
                        <select class="form-control" id="1" name="storage[]" onchange="local(this)">
                          <option value="1">Local</option>
                          <option value="0">Web</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4" id="URL1">
                        <!--add required no que for ser usado, remover do outro-->
                        <!--#pathMaterial { display: none; }-->
                        <label class="pathMaterial1" for="pathMaterial1">Arquivo</label>
                        <input id="pathMaterial1" type="file" class="form-control-file pathMaterial1" name="pathMaterial[]">
                        <small id="fileHelp" class="form-text text-muted pathMaterial1">Tamanho máximo 20MB.</small>
                        <input type="hidden" class="pathMaterial1" name="urlMaterial[]" value="" style="display: none" minlength="5" maxlength="191">
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>

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


    <div class="row align-items-end">
      <div class="col-md-12" >
        <div class="row" id="materiais">

        </div>
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

      var a = 2;

      $(".fa-plus").click(function(){
          $(".nav-tabs").append(
              '<li id="'+a+'"><a href="#material'+a+'" data-toggle="tab" id="ui-id-'+a+'">Material'+a+'</a></li>'
          );
          $(".tab-content").append(
              `<div class="tab-pane" id="material${a}">
                <fieldset>
                  <legend>@lang('messages.informations'):</legend>
                  <div class="row">
                    <div class="form-group col-md-2">
                      <label for="ordem">@lang('messages.order')</label>
                      <input id="ordem" type="text" class="form-control ordem" name="ordem[]" required minlength="1" maxlength="2">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="tipoMat_id">@lang('messages.type-mat')</label>
                      <select class="form-control" id="tipoMat_id" name="tipoMat_id[]">
                        @if(count($tiposMat) > 0)
                          @foreach ($tiposMat as $tipoMat)
                            <option value="{{$tipoMat->id}}">{{$tipoMat->descricao}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="descricaoMaterial">@lang('messages.description')</label>
                      <input id="descricaoMaterial" type="text" class="form-control" name="descricaoMaterial[]" required minlength="3" maxlength="60">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-2">
                      <label for="storage${a}">@lang('messages.source')</label>
                      <select class="form-control" id="${a}" name="storage[]" onchange="local(this)">
                        <option value="1">Local</option>
                        <option value="0">Web</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4" id="URL${a}">
                      <label class="pathMaterial${a}" for="pathMaterial${a}">@lang('messages.path')</label>
                      <input id="pathMaterial${a}" type="file" class="form-control-file pathMaterial${a}" name="pathMaterial[]" >
                      <small id="fileHelp" class="form-text text-muted pathMaterial${a}">Tamanho máximo 20MB.</small>
                      <input class="pathMaterial${a}" type="hidden" name="urlMaterial[]" value="" style="display: none" minlength="5" maxlength="191">
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

          /*$(".ordem").append(
              '<option value="'+a+'">'+a+'</option>'
          );

          ordens = $(".ordem>option").clone();
          console.log(ordens);
          $(".novaordem>option").remove();
          $(".novaordem").append(ordens);*/

          a = a+1;
      });

      function remover(botao){
          var seletorLi = 'li#' + botao.id;
          var seletorDiv = 'div#material' + botao.id;
          $(seletorLi).remove();
          $(seletorDiv).remove();
          $("div#unidade1").addClass('active');
          $("a#ui-id-1").click();
      }

      function local(option){
          id = option.id;
          value = option.value;
          console.log(option);
          console.log(id);
          console.log(value);
          seletorPath = '.pathMaterial' +id;
          console.log(seletorPath);
          seletorUrlMat = '.urlMaterial'+id;
          console.log(seletorUrlMat);
          seletorUrl = '#URL'+id;
          console.log(seletorUrl);

          if (value == 0){
              $(seletorPath).remove();
              $(seletorUrl).append(
                  `<label class="urlMaterial${id}" for="urlMaterial${id}">@lang('messages.url')</label>
                   <input id="urlMaterial${id}" type="text" class="form-control urlMaterial${id}" name="urlMaterial[]" required>`
              );

          }else {
              $(seletorUrlMat).remove();
              $(seletorUrl).append(
                  `<label class="pathMaterial${id}" for="pathMaterial${id}">@lang('messages.path')</label>
                  <input id="pathMaterial${id}" type="file" class="form-control-file pathMaterial${id}" name="pathMaterial[]">
                  <small id="fileHelp" class="form-text text-muted pathMaterial${id}">Tamanho máximo 20MB.</small>
                  <input class="pathMaterial${id}" type="hidden" name="urlMaterial[]" value="" style="display: none">`
              );
          }


      }

      function carregarUnidades(curso){
          $.getJSON('/api/unidades/'+curso.value, function (unidade) {
              $('#unidade_id>option').remove();
              console.log(unidade);
              for (i=0; i<unidade.length; i++){
                  option = '<option value="' + unidade[i].id+ '">' + unidade[i].titulo +'</option>';
                  $('#unidade_id').append(option);
                  carregarMateriais($('#unidade_id')[0]);
              }
          })
      }

      function carregarMateriais(unidade){

          $.getJSON('/api/materiais/'+unidade.value, function (materiais) {
              $('div#materiais>div').remove();

              for (i=0; i<materiais.length; i++) {
                  $('div#materiais').append(
                      `<div class="col-lg-2 col-xs-2"><div class="small-box bg-white"><div class="inner"><h3>${materiais[i].id}</h3><p>${materiais[i].descricao}</p></div><div class="icon"><i class=""></i></div><a class="small-box-footer" href="/materiais/${materiais[i].id}/edit" >Ordem: ${materiais[i].ordem}&nbsp;&nbsp;Editar <i class="fa fa-arrow-circle-right"></i></a></div></div>`);

              }
              console.log(materiais.length);
              if (materiais.length > 0){
                  $('#mat-cadastrados').show();
              } else {
                  $('#mat-cadastrados').hide();
              }
          });



      }



      $(function(){
          $("#tabs").tabs();
          carregarUnidades($('#curso_id')[0]);
      });
  </script>
@endpush
