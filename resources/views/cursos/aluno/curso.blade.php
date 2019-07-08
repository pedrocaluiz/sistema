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
  </style>
@endpush

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
    @if (isset($curso, $cat, $user, $user_curso))
      <!--Partials .. Curso INFO.. -->
        @includeIf('layouts.subviews.partials.curso-info')
    @endif
    </div>
  </div>


  <div class="row align-items-end">
    <div class="col-md-12">
      @if (isset($unidades, $user_curso[0] ))
        <div class="row">
          @foreach ($unidades as $unidade)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-white">
                <div class="inner">
                  <h3>{{$unidade->id}}</h3>
                  <p>{{$unidade->titulo}}</p>
                </div>
                <div class="icon">
                  <i class=""></i>
                </div>
                <!-- small box footer -->
                <a href="/unidades/aluno/{{$unidade->id}}" class="small-box-footer">
                  Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      @endif
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

      $("#formCurso").submit( function(event){
          event.preventDefault();
      });

      function inscrever() {
          dados = {
              curso_id: $("#curso_id").val()
          };
          console.log(dados);
          $.post("/inscrever/curso", dados).done(function( data ) {
              console.log(data);
              dataJson = JSON.parse(data);
              console.log(dataJson);
              $("#btnInscrever").remove();
              $("div#inscrito").append(
                  `<p><strong>Sua inscrição foi efetuada</strong></p>`
              );
              $('section.content').append(
                  `<div class="row">
                     @foreach ($unidades as $unidade)
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-white">
                            <div class="inner">
                              <h3>{{$unidade->id}}</h3>
                              <p>{{$unidade->titulo}}</p>
                            </div>
                              <div class="icon"><i class=""></i></div>
                            <a href="/unidades/aluno/{{$unidade->id}}" class="small-box-footer">
                              Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                            </a>
                          </div>
                        </div>
                     @endforeach
                   </div>`
              );
          });
      }

  </script>
@endpush