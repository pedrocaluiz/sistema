@extends('layouts.base', ["current" => "unidades"])

@section('header')
  @lang('messages.unity')
@endsection

@section('title')
  @lang('messages.unity')
@endsection

@push('css')
  <style>

  </style>
@endpush

@section('content')
  <form method="POST" action="/unidades/instrutor/{{$unidade->id}}" enctype="multipart/form-data" class="cadastro">
    @method('PUT')
    @csrf
    <div class="row align-items-end">
      <div class="col-md-12">
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.edit')
              @lang('messages.unity')
            </h3>
          </div>
          <div class="box-body">
            <input type="hidden" name="usuarioAtualizacao" value="{{Auth::user()->id}}">
            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="curso_id">@lang('messages.course')</label>
                  <select class="form-control select2" id="curso_id" name="curso_id" onchange="carregarUnidades(this)">
                    @if(count($cursos) > 0)
                      @foreach ($cursos as $curso)
                        @if ($curso->id == $unidade->curso_id)
                          <option value="{{$curso->id}}" selected>{{$curso->titulo}}</option>
                        @else
                          <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                        @endif
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>
            </fieldset>




            <fieldset>
              <legend>@lang('messages.informations'):</legend>
              <div class="row">
                <div class="form-group col-md-2">
                  <label for="ordem">@lang('messages.order')</label>
                  <input id="ordem" type="text" class="form-control ordem" name="ordem" placeholder="{{$unidade->ordem}}" value="{{$unidade->ordem}}" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="tituloUnidades">@lang('messages.title')</label>
                  <input id="tituloUnidades" type="text" class="form-control" name="tituloUnidade" placeholder="{{$unidade->titulo}}" value="{{$unidade->titulo}}"required>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="box-footer d-flex justify-content-center">
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

  <fieldset id="unid-cadastrados" style="display: none">
    <legend>Unidades cadastrados neste Curso:</legend>
    <div class="row align-items-end">
      <div class="col-md-12" >
        <div class="row" id="unidades">

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

      function carregarUnidades(curso){
          $.getJSON('/api/unidades/'+curso.value, function (unidades) {
              $('div#unidades>div').remove();
              for (i=0; i<unidades.length; i++) {
                  $('div#unidades').append(
                      `<div class="col-lg-2 col-xs-2"><div class="small-box bg-white"><div class="inner"><h3>${unidades[i].id}</h3><p>${unidades[i].titulo}</p></div><div class="icon"><i class=""></i></div><a class="small-box-footer" href="/unidades/instrutor/${unidades[i].id}/edit" >Ordem: ${unidades[i].ordem}&nbsp;&nbsp;Editar <i class="fa fa-arrow-circle-right"></i></a></div></div>`);
              }
              if (unidades.length > 0){
                  $('#unid-cadastrados').show();
              } else {
                  $('#unid-cadastrados').hide();
              }
          });
      }

      $(function(){
          carregarUnidades($('#curso_id')[0]);
      });

  </script>

@endpush