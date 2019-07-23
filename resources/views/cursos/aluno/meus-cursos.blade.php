@extends('layouts.base', ["current" => "cursos"])

@section('header')
  @lang('messages.course')
@endsection

@section('title')
  @lang('messages.course')
@endsection

@push('css')
  <style>
    .box-header>i{
      margin-right: 5px !important;
      margin-top: 15px !important;
      left: 30px !important;
      position: absolute !important;
      font-size: 60px !important;
    }
    .box-header>h1{
      margin-top: 15px !important;
    }
    .curso>.box-title {
      font-size: 60px;
    }
    .curso {
      display: flex;
      justify-content: center;
    }
    .box-curso {
     padding: 30px;
    }
    .ordem {
      text-align: center;
      width: 40px;
    }
    .progresso {
      width: 200px;
      padding: 15px 5px !important;
    }
    .percent{
      width: 150px;
      text-align: center;
    }
    .progress{
      margin-bottom: 0 !important;
    }


  </style>
@endpush

@section('content')
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

@endsection



@push('scripts')
  <script type="text/javascript">

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });

  </script>
@endpush