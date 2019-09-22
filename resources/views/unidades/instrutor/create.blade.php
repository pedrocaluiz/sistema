@extends('layouts.base', ["current" => "unidades", "menu" => "cadastrar"])

@section('header')
  @lang('messages.unity')
@endsection

@section('title')
    <a href="{{route('unidades')}}"> @lang('messages.units')</a>
@endsection

@push('css')
  <style>
    #unidades {
      display: flex;
      flex-wrap: wrap;
    }
    .flex-itens {
      display: flex;
    }
    .small-box {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    .small-box > .inner {
      flex-grow: 1;
    }
  </style>
@endpush

@section('content')
  <form method="POST" action="{{ route('unidades.store') }}" enctype="multipart/form-data" class="cadastro">
    @csrf
    <div class="row align-items-end">
      <div class="col-md-12" >
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">
              @lang('messages.create')
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
                  <select class="form-control " id="curso_id" name="curso_id" onchange="carregarUnidades(this)">
                      <option value="" disabled selected>SELECIONE</option>
                    @php $perfil = Auth::user()->perfil->where('administrador', 1);@endphp
                    @if (count($cursos) > 0 and count($perfil) > 0)
                      @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                      @endforeach
                    @elseif (count($cursos) > 0)
                      @foreach ($cursos->where('usuarioAtualizacao', Auth::user()->id) as $curso)
                        <option value="{{$curso->id}}">{{$curso->titulo}}</option>
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
                  <input id="ordem" type="text" class="form-control ordem" name="ordem" placeholder="Ordem da Unidade" required minlength="1" maxlength="2">
                </div>
                <div class="form-group col-md-4">
                  <label for="tituloUnidades">@lang('messages.title')</label>
                  <input id="tituloUnidades" type="text" class="form-control" name="tituloUnidade" placeholder="Digite o Título da Unidade" required minlength="3" maxlength="60">
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

        </div>
      </div>
    </div>
  </form>

<fieldset id="unid-cadastrados" style="display: none">
<legend>Unidades cadastrados neste Curso:</legend>
    <div class="row align-items-end">
      <div class="col-md-12">
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

      function carregarUnidades(curso){
          $.getJSON('/api/unidades/'+curso.value, function (unidades) {
              $('div#unidades>div').remove();
              for (i=0; i<unidades.length; i++) {
                  $('div#unidades').append(
                      `<div class="col-lg-3 col-xs-6 flex-itens"><div class="small-box bg-white"><div class="inner"><h3>${unidades[i].id}</h3><p>${unidades[i].titulo}</p></div><div class="icon"><i class=""></i></div><a class="small-box-footer" href="/unidades/${unidades[i].id}/edit" >Ordem: ${unidades[i].ordem}&nbsp;&nbsp;Editar <i class="fa fa-arrow-circle-right"></i></a></div></div>`);
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
