@extends('layouts.base', ["menu" => "listar", "current" => "usuarios"])

@section('header')
  @lang('messages.courses')
@endsection

@section('title')
  {{$user->primeiroNome}} {{$user->ultimoNome}}
@endsection

@push('css')
<!-- CSS HERE -->

  <style>
    /*parte mobile*/

    @media(max-width: 997px){

        table#example1 td:nth-child(3) {
            display: none;
        }

        thead th:nth-child(3) {
            display: none;
        }

        tfoot th:nth-child(3) {
            display: none;
        }

        #nome {
            width: 60% !important;
        }
    }

    /*parte mobile*/
    @media(max-width: 1335px){

        table#example1 td:nth-child(1), td:nth-child(4) {
            display: none;
        }

        thead th:nth-child(1), th:nth-child(4) {
            display: none;
        }

        tfoot th:nth-child(1), th:nth-child(4) {
            display: none;
        }
    }

  </style>
@endpush

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            @if (!empty($adicionada))
              <div class="row" style="display: flex; justify-content: space-around">
                <div class="col-md-6">
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{$adicionada}}</h4>
                  </div>
                </div>
              </div>
            @endif
            @if (!empty($excluida))
              <div class="row" style="display: flex; justify-content: space-around">
                <div class="col-md-6">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{$excluida}}</h4>
                  </div>
                </div>
              </div>
            @endif
            @if (!empty($alterada))
              <div class="row" style="display: flex; justify-content: space-around">
                <div class="col-md-6">
                  <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{$alterada}}</h4>
                  </div>
                </div>
              </div>
            @endif
            <div class="row">
              <div class="col-sm-12">
                @if (isset($cursos))
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th>ID</th>
                      <th id="nome">Curso</th>
                      <th>Nota Curso</th>
                      <th>Progresso</th>
                      <th>Status</th>
                      <th id="acoes1">Ação</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($cursos as $curso)
                      @php
                      if ($curso->usuario->where('id', $user->id)->first() !== null){
                        $notaCurso = $curso->usuario->where('id', $user->id)->first()->pivot->notaAval;
                      }
                        foreach ($curso->unidades as $unidade){
                            $questoes = $unidade->questoes;
                            if (count($questoes) > 0){
                                $ha_questoes = 1;
                                break;
                            }else{
                                $ha_questoes = 0;
                            }
                        }
                      @endphp
                      <tr>
                        <td>{{$curso->id}}</td>
                        <td>{{$curso->titulo}}</td>
                        <td>
                          @if ($ha_questoes == 0)
                            Sem avaliação
                          @elseif (empty($notaCurso)) 0.00
                          @else {{$notaCurso}}
                          @endif
                        </td>

                      @forelse ($curso->usuario->where('id', $user->id) as $user)

                          @if (empty($user->pivot->dataConclusao))
                          <!--Existe registro na tabela UCUMP, mas não existe dataConclusao-->
                            @if ($progressoCurso[$curso->id] == 100)
                                <td class="progresso">
                                  <div class="progress progress-xs progress-striped active" >
                                    <div title="{{$progressoCurso[$curso->id]}}%" class="progress-bar progress-bar-light-blue" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-blue">Falta Avaliação*</span></td>
                            @else
                              <td class="progresso">
                                <div class="progress progress-xs progress-striped active" >
                                  @if ($progressoCurso[$curso->id] > 5)
                                    <div title="{{$progressoCurso[$curso->id]}}%" class="progress-bar progress-bar-yellow" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                                  @else
                                    <div class="progress-bar progress-bar-yellow" style="width: 5%"></div>
                                  @endif
                                </div>
                              </td>
                              <td><span class="badge bg-yellow">Em Andamento</span></td>
                            @endif
                          @elseif ($notaCurso >= 7 or $ha_questoes == 0)
                              <!--Existe registro na tabela UCUMP e dataConclusao checked-->
                              <td class="progresso">
                                <div class="progress progress-xs progress-striped active" >
                                  <div title="{{$progressoCurso[$curso->id]}}%" class="progress-bar progress-bar-green" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-green">Aprovado</span></td>
                            @else
                            <!--Existe registro na tabela UCUMP e dataConclusao checked-->
                            <td class="progresso">
                              <div class="progress progress-xs progress-striped active" >
                                <div title="{{$progressoCurso[$curso->id]}}%" class="progress-bar progress-bar-light-blue" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-blue">Falta Avaliação*</span></td>
                          @endif
                        @empty
                          <!--Não existe registro na tabela UCUMP-->
                          <td class="progresso">
                            <div class="progress progress-xs progress-striped active" >
                              <div class="progress-bar progress-bar-red" style="width: 5%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-red">Não iniciada</span></td>
                        @endforelse
                        <td>
                          <a href="/usuarios/relatorio/{{$user->id}}/curso/{{$curso->id}}" class="btn btn=sm btn-info acaoTxt">Detalhes</a>
                          <a href="/usuarios/relatorio/{{$user->id}}/curso/{{$curso->id}}" class="btn btn=sm btn-info acaoIcon"><i class="fa fa-list-ul"></i></a>
                        </td>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Curso</th>
                      <th>Nota Curso</th>
                      <th>Progresso</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                    </tfoot>
                  </table>
                @endif
              </div>
            </div>
          </div>
        </div>
          <div class="box-footer d-flex justify-content-center">
              <div class="col-md-2">
                  <a href="/usuarios/relatorio-pdf/{{$user->id}}" type="button"  class="btn btn-primary botao" id="cadastro">
                      <i class="fa fa-print"></i> &nbsp;&nbsp;Imprimir
                  </a>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@endpush

