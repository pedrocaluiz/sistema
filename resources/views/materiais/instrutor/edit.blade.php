@extends('layouts.base', ["current" => "materiais"])

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
  <form method="POST" action="/materiais/{{$material->id}}" enctype="multipart/form-data" class="cadastro">
    @method('PUT')
    @csrf
    <div class="row align-items-end">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.material')
            </h3>
          </div>
          <div class="box-body">
            <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
            <div class="row">
              <div class="form-group col-md-3">
                <label for="unidade_id">@lang('messages.unity')</label>
                <select class="form-control select2" id="unidade_id" name="unidade_id" onchange="carregarMateriais(this)">
                  @if(count($unidades) > 0)
                    @foreach ($unidades as $u)
                      @if ($u->id == $material->unidade_id)
                        <option value="{{$u->id}}" selected>{{$u->titulo}}</option>
                      @else
                        <option value="{{$u->id}}">{{$u->titulo}}</option>
                      @endif
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <hr class="my-4">
            <div id="tabs" class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#material1" data-toggle="tab" aria-expanded="true">Material1</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="material1">
                  <fieldset>
                    <legend>@lang('messages.informations'):</legend>
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="ordem">@lang('messages.order')</label>
                        <label for="ordem">@lang('messages.order')</label>
                        <input id="ordem" type="text" class="form-control ordem" name="ordem"
                               placeholder="{{$material->ordem}}" value="{{$material->ordem}}" required minlength="1" maxlength="2">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="tipoMat_id">@lang('messages.type-mat')</label>
                        <select class="form-control" id="tipoMat_id" name="tipoMat_id">
                          @if(count($tiposMat) > 0)
                            @foreach ($tiposMat as $tipoMat)
                              @if ($tipoMat->id == $material->material_id)
                                <option value="{{$tipoMat->id}}" selected>{{$tipoMat->descricao}}</option>
                              @else
                                <option value="{{$tipoMat->id}}">{{$tipoMat->descricao}}</option>
                              @endif
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="descricaoMaterial">@lang('messages.description')</label>
                        <input id="descricaoMaterial" type="text" class="form-control" name="descricaoMaterial"
                               placeholder="{{ $material->descricao }}" value="{{ $material->descricao }}"required minlength="3" maxlength="60">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="storage1">@lang('messages.source')</label>
                        <select class="form-control" id="1" name="storage" onchange="local(this)">
                          <option value="1">Local</option>
                          <option value="0">Web</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4" id="URL1">
                        <!--add required no que for ser usado, remover do outro-->
                        <!--#pathMaterial { display: none; }-->
                        <label class="pathMaterial1" for="pathMaterial1">Arquivo</label>
                        <input id="pathMaterial1" type="file" class="form-control-file pathMaterial1" name="pathMaterial" minlength="5" maxlength="191">
                        <small id="fileHelp" class="form-text text-muted pathMaterial1">Tamanho máximo 20MB.</small>
                        <input type="hidden" class="pathMaterial1" name="urlMaterial" value="" style="display: none" minlength="5" maxlength="191">
                      </div>
                      @isset($user)
                      <!--Partials .. Atualizado Por.. -->
                        @includeIf('layouts.subviews.partials.atualizado-por')
                      @endif
                    </div>
                  </fieldset>
                </div>
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

  <fieldset id="mat-cadastrados" style="display: none;">
    <legend>Materiais cadastrados nesta Unidade:</legend>
    <div class="row align-items-end">
      <div class="col-md-12" >
        <div class="row" id="materiais">

        </div>
      </div>
    </div>
  </fieldset>


@endsection

@push('scripts')
  <script type="text/javascript">

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });

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
                   <input id="urlMaterial${id}" type="text" class="form-control urlMaterial${id}" name="urlMaterial" required minlength="5" maxlength="191">`
              );

          }else {
              $(seletorUrlMat).remove();
              $(seletorUrl).append(
                  `<label class="pathMaterial${id}" for="pathMaterial${id}">@lang('messages.path')</label>
                  <input id="pathMaterial${id}" type="file" class="form-control-file pathMaterial${id}" name="pathMaterial" >
                  <small id="fileHelp" class="form-text text-muted pathMaterial${id}">Tamanho máximo 20MB.</small>
                  <input class="pathMaterial${id}" type="hidden" name="urlMaterial" value="" style="display: none">`
              );
          }
      }

      function carregarMateriais(unidade) {

          $.getJSON('/api/materiais/' + unidade.value, function (materiais) {
              $('div#materiais>div').remove();

              for (i = 0; i < materiais.length; i++) {
                  $('div#materiais').append(
                      `<div class="col-lg-2 col-xs-2"><div class="small-box bg-white"><div class="inner"><h3>${materiais[i].id}</h3><p>${materiais[i].descricao}</p></div><div class="icon"><i class=""></i></div><a class="small-box-footer" href="/materiais/${materiais[i].id}/edit" >Ordem: ${materiais[i].ordem}&nbsp;&nbsp;Editar <i class="fa fa-arrow-circle-right"></i></a></div></div>`);

              }
              console.log(materiais.length);
              if (materiais.length > 0) {
                  $('#mat-cadastrados').show();
              } else {
                  $('#mat-cadastrados').hide();
              }
          });
      }

          /*function carregarOrdens(curso){
              $.getJSON('/api/unidades/ordens/'+curso.value, function (ordens) {
                  $('#ordem>option').remove();
                  $('#ordem').append(
                      '<option value="1">1</option>'
                  );
                  console.log(ordens);
                  for (i=0; i<ordens.length; i++){
                      option = '<option value="' + ordens[i].ordem+ '">' + ordens[i].ordem +'</option>';
                      $('#ordem').append(option);
                  }
              })
          }*/

      $(function(){

      });
  </script>
@endpush
