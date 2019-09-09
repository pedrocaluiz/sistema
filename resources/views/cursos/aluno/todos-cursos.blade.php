@extends('layouts.base', ["current" => "todos-cursos"])

@section('header')
  @lang('messages.course')
@endsection

@section('title')
  @lang('messages.course')
@endsection

@push('css')
  <style>

      .flex-end>.icon{
          font-size: 45px;
      }

    .box-title>h1{
      font-size: 35px;
    }
    .flex-end{
      display: flex;
      justify-content: flex-end;
      margin-top: 15px;
    }
     .box-header{
         display: flex;
         justify-content: center;
     }

    .small-box h3 {
        font-size: 25px;
    }
    .small-box>.inner {
        height: 180px;
    }

    @media(max-width: 997px){
        .small-box h3 {
            font-size: 18px;
        }
        .small-box>.inner {
            height: 70px;
        }
        p.descricao {
            display: none;
        }
    }

  </style>
@endpush

@section('content')


@foreach($categorias as $categoria)
  <div class="box box-primary">
    <div class="box-header with-border">
      <div class="col-md-6">
        <div class="box-title">
          <h1>{{$categoria->descricao}}</h1>
        </div>
      </div>
      <div class="col-md-6 flex-end">
        <div class="icon">
          <i class="{{$categoria->icone}}"></i>
        </div>
      </div>
    </div>
    <div class="box-body">
      <div class="row" id="row">
        @forelse($categoria->cursos as $curso)
          <div class="col-lg-6 col-xs-12" >
            <!-- small box -->
            <div class="small-box teste" >
              <div class="inner">
                <h3>{{$curso->titulo}}</h3>

                <p class="descricao">{{$curso->descricao}}</p>
              </div>
              <div class="icon">
                <i class="{{$curso->icone}}"></i>
              </div>
              <a href="/cursos/{{$curso->id}}" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        @empty
          <div class="col-lg-12 col-xs-12" >
            <!-- small box -->
            <div class="small-box bg-white" >
              <div class="inner">
                <h3>Cursos</h3>

                <p>Não há nenhum curso cadastrado</p>
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
@endforeach


@endsection

@section('teste')
  <div class="row align-items-end">
    @forelse($cursos as $curso)
      <div class="col-md-4">
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-yellow">
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset('AdminLTE/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{{$curso->titulo}}</h3>
            <h5 class="widget-user-desc">{{$curso->descricao}}</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked" style="width: 100%">
              @foreach($curso->unidades as $unidade)
                <li><a href="#">{{$unidade->id}} <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">{{$unidade->titulo}} <span class="pull-right badge bg-aqua">5</span></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @empty
    @endforelse
  </div>
  <div class="row">
    <div class="col-lg-4 col-xs-8">
      <!-- small box -->
      <div id="teste" class="small-box">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-4 col-xs-8">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-8">
      <!-- small box -->
      <div class="small-box bg-yellow bg-aqua bg-green bg-navy bg-blue bg-light bg-olive bg-orange bg-red">



        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-8">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
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
