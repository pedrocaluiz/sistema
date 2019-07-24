@extends('layouts.base', ["current" => "meus-cursos"])

@section('header')
  @lang('messages.course')
@endsection

@section('title')
  @lang('messages.course')
@endsection

@push('css')
  <style>

    .box-header{
      display: flex;
      justify-content: center;
    }

    .box-title>h1{
      font-size: 35px;
    }
  </style>
@endpush

@section('content')
  <div class="box">
    <div class="box-header">
      <div class="box-title">
        <h1>Cursos Concluídos</h1>
      </div>
    </div>
    <div class="box-body">
      <div class="row" id="row">
        @forelse($concluidos as $c)
          <div class="col-lg-6 col-xs-12" >
            <!-- small box -->
            <div class="small-box teste" >
              <div class="inner">
                <h3>{{$c->titulo}}</h3>

                <p>{{$c->descricao}}</p>
              </div>
              <div class="icon">
                <i class="{{$c->icone}}"></i>
              </div>
              <a href="/cursos/{{$c->id}}" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        @empty
          <div class="col-lg-12 col-xs-12" >
            <!-- small box -->
            <div class="small-box bg-white" >
              <div class="inner">
                <h3>Concluídos</h3>

                <p>Não há nenhum curso concluído</p>
              </div>
              <div class="icon">
                <i class="fa fa-times-circle"></i>
              </div>
              <div class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></div>
            </div>
          </div>
        @endforelse
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

      function random_item(colors)
      {
          //randomiza as classes
          return colors[Math.floor(Math.random()*colors.length)];
      }

      function gera_cor(elemento){
          var colors = ['bg-yellow', 'bg-aqua', 'bg-green', 'bg-navy', 'bg-blue', 'bg-olive', 'bg-orange', 'bg-red'];
          var bgcolor = $('.teste');
          bgcolor.each(function( index ) {
              //para cada .teste adiciona uma classe
              var random = random_item(colors);
              $( this ).addClass(random);
              var pos = colors.indexOf(random); //pega o índice que foi passado
              var removedItem = colors.splice(pos, 1); //retira esse elemento, para não repetir cores
              if (colors.length <= 0) { colors = ['bg-yellow', 'bg-aqua', 'bg-green', 'bg-navy', 'bg-blue', 'bg-light', 'bg-olive', 'bg-orange', 'bg-red']; }
          });
      }

      $(function(){
          gera_cor($('.teste'));
      });

  </script>
@endpush