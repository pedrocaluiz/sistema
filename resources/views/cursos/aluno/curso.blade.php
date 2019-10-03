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
    .d-center{
        display: flex;
        justify-content: center;
    }

    #inscrito {
        min-width: 150px;
    }
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
    /*.box-header{
        display: flex;
        justify-content: center;
    }*/

    /*parte mobile*/
    @media(max-width: 997px){

        table#table-materiais td:nth-child(3) {
            display: none;
        }

        table#table-materiais th:nth-child(3) {
            display: none;
        }

        .box-body h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .box-header h1{
            font-size: 30px;
            margin-bottom: 10px;
        }

        .box-body p {
            font-size: 15px;
        }

        .d-flex {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

    }
    /*parte mobile usuarios*/
    @media(max-width: 1135px){

        table#table-materiais td:nth-child(1){
            display: none;
        }

        table#table-materiais th:nth-child(1) {
            display: none;
        }
    }

  </style>
@endpush

@section('content')
    @php $adm = Auth::user()->perfil->where('administrador', 1)->first();@endphp
  <div class="row align-items-end">
    <div class="col-md-12">
    @if (isset($curso, $cat, $user))
      <!--Partials .. Curso INFO.. -->
        @includeIf('layouts.subviews.partials.curso-info')
      @endif
    </div>
  </div>

@if (!empty($user_curso->first()) or isset($adm) or Auth::user()->id == $curso->usuarioAtualizacao)
  {{--@if (isset($user_curso[0]))--}}
  <div class="row align-items-end">
    <div class="col-md-12">
      @if (isset($unidades))
        <div class="row">

          @foreach ($unidades as $unidade)
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">{{$curso->titulo}}</h3>
                </div>
                <!-- /.box-header -->

                  @if (isset($adm) or Auth::user()->id == $curso->usuarioAtualizacao)
                      <div class="box-body">
                          <table class="table table-bordered table-striped">
                              <tbody>
                              <tr>
                                  <th class="ordem">{{$unidade->id}}</th>
                                  <th><a href="/unidades/{{$unidade->id}}">{{$unidade->titulo}}</a></th>
                              </tr>
                  @elseif (!empty($user_curso->first()))
                      <div class="box-body">
                          <table id="table-materiais" class="table table-bordered table-striped">
                              <tbody>
                              <tr>
                                  <th class="ordem">{{$unidade->id}}</th>
                                  <th><a href="/unidades/{{$unidade->id}}">{{$unidade->titulo}}</a></th>
                                  @forelse ($unidade->usuario->where('id', Auth::user()->id) as $user)
                                      @if (empty($user->pivot->dataConclusao))
                                          @if (count($unidade->materiais) > 0)
                                              <th class="progresso">
                                                  <div class="progress progress-xs progress-striped active" >
                                                      <div class="progress-bar progress-bar-yellow" style="width: 66%"></div>
                                                  </div>
                                              </th>
                                              <th class="percent">
                                                  <span class="badge bg-yellow">Em andamento</span>
                                              </th>
                                          @else
                                              <th class="progresso">
                                                  <div class="progress progress-xs progress-striped active" >
                                                      <div class="progress-bar progress-bar-light-blue" style="width: 100%"></div>
                                                  </div>
                                              </th>
                                              <th class="percent">
                                                  <span class="badge bg-light-blue">Falta Avaliação*</span>
                                              </th>
                                          @endif
                                      @elseif (($unidade->provas->max('notaAval') > 7) or (empty($unidade->questoes->first())))
                                          <th class="progresso">
                                              <div class="progress progress-xs progress-striped active" >
                                                  <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                                              </div>
                                          </th>
                                          <th class="percent">
                                              <span class="badge bg-green">Concluído</span>
                                          </th>
                                      @else
                                          <th class="progresso">
                                              <div class="progress progress-xs progress-striped active" >
                                                  <div class="progress-bar progress-bar-light-blue" style="width: 100%"></div>
                                              </div>
                                          </th>
                                          <th class="percent">
                                              <span class="badge bg-light-blue">Falta Avaliação*</span>
                                          </th>
                                      @endif
                                  @empty
                                      <th class="progresso">
                                          <div class="progress progress-xs progress-striped active" >
                                              <div class="progress-bar progress-bar-danger" style="width: 33%"></div>
                                          </div>
                                      </th>
                                      <th class="percent">
                                          <span class="badge bg-red">Não iniciado</span>
                                      </th>
                                  @endforelse
                              </tr>
                  @endif
                      @php $adm = Auth::user()->perfil->where('administrador', 1)->first();@endphp
                          @if (isset($adm) or Auth::user()->id == $curso->usuarioAtualizacao)
                              @foreach($unidade->materiais->sortBy('ordem') as $material)
                                  <tr>
                                      <td class="ordem">{{$material->ordem}}</td>
                                      <td><a href="/unidades/{{$unidade->id}}?page={{$loop->iteration}}">{{$material->descricao}}</a></td>
                                  </tr>
                              @endforeach
                          @elseif (!empty($user_curso->first()))
                              @foreach($unidade->materiais->sortBy('ordem') as $material)
                                  <tr>
                                      <td class="ordem">{{$material->ordem}}</td>
                                      <td><a href="/unidades/{{$unidade->id}}?page={{$loop->iteration}}">{{$material->descricao}}</a></td>
                                  @forelse ($material->usuario->where('id', Auth::user()->id) as $user)
                                      @if (empty($user->pivot->dataConclusao))
                                          <!--Existe registro na tabela UCUMP, mas não existe registro no dataConclusao-->
                                              <td class="progresso">
                                                  <div class="progress progress-xs progress-striped active" >
                                                      <div class="progress-bar progress-bar-yellow" style="width: 66%"></div>
                                                  </div>
                                              </td>
                                              <td class="percent">
                                                  <span class="badge bg-yellow">Em andamento</span>
                                              </td>

                                      @else
                                          <!--Existe registro na tabela UCUMP e dataConclusao-->
                                              <td class="progresso">
                                                  <div class="progress progress-xs progress-striped active" >
                                                      <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                                                  </div>
                                              </td>
                                              <td class="percent">
                                                  <span class="badge bg-green">Concluído</span>
                                              </td>
                                      @endif
                                  @empty
                                      <!--Não existe registro na tabela UCUMP-->
                                          <td class="progresso">
                                              <div class="progress progress-xs progress-striped active" >
                                                  <div class="progress-bar progress-bar-danger" style="width: 33%"></div>
                                              </div>
                                          </td>
                                          <td class="percent">
                                              <span class="badge bg-red">Não iniciado</span>
                                          </td>
                                      @endforelse
                                  </tr>
                              @endforeach
                          @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          @endforeach
        </div>
        @endif
    </div>
  </div>
  @endif
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

      /*function inscrever() {
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
                            <a href="/unidades/{{$unidade->id}}" class="small-box-footer">
                              Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                            </a>
                          </div>
                        </div>
                     @endforeach
                   </div>`
              );
          });
      }*/

  </script>
@endpush
