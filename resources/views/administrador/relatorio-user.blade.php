@extends('layouts.base', ["current" => "relatorio-user"])

@section('header')
  @lang('messages.courses')
@endsection

@section('title')
  @lang('messages.courses')
@endsection

@push('css')
<!-- CSS HERE -->

  <style>
    /*parte mobile*/

    @media(max-width: 997px){

        table#example1 td:nth-child(3), td:nth-child(4) {
            display: none;
        }

        thead th:nth-child(3), th:nth-child(4) {
            display: none;
        }

        tfoot th:nth-child(3), th:nth-child(4) {
            display: none;
        }

        #nome {
            width: 60% !important;
        }
    }

    /*parte mobile*/
    @media(max-width: 1335px){

        table#example1 td:nth-child(3), td:nth-child(5) {
            display: none;
        }

        thead th:nth-child(3), th:nth-child(5) {
            display: none;
        }

        tfoot th:nth-child(3), th:nth-child(5) {
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
                @if (isset($user))
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          id="id" aria-label="ID: activate to sort column descending" >
                        ID
                      </th>
                      <th id="nome" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Curso: activate to sort column ascending" >
                        Curso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Nota Curso: activate to sort column ascending" >
                        Nota Curso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Progresso: activate to sort column ascending" >
                        Progresso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Status: activate to sort column ascending" >
                        Status
                      </th>
                      <th id="acoes" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Ação: activate to sort column ascending" >
                        Ação
                      </th>
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($cursos as $curso)
                      <tr>
                        <td>{{$curso->id}}</td>
                        <td>{{$curso->titulo}}</td>
                        <td>
                          @if(!empty($notaCurso[$curso->id]))
                            @if ($notaCurso[$curso->id] < 1)
                                Não Aprovado
                            @else
                                Aprovado
                            @endif
                          @else
                            Não Aprovado
                          @endif
                        </td>

                      @forelse ($curso->usuario->where('id', $user->id) as $user)
                        @php

                         // dd($curso->usuario->where('id', $user->id)->first()->pivot->dataConclusao);

                        @endphp
                          @if (empty($user->pivot->dataConclusao))
                          <!--Existe registro na tabela UCUMP, mas não existe dataConclusao-->
                            @if ($progressoCurso[$curso->id] == 100)
                                <td class="progresso">
                                  <div class="progress progress-xs progress-striped active" >
                                    <div class="progress-bar progress-bar-light-blue" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-blue">Falta Avaliação*</span></td>
                            @else
                              <td class="progresso">
                                <div class="progress progress-xs progress-striped active" >
                                  <div class="progress-bar progress-bar-yellow" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-yellow">Em Andamento</span></td>
                            @endif
                          @elseif ($notaCurso[$curso->id] >= 1)
                              <!--Existe registro na tabela UCUMP e dataConclusao checked-->
                              <td class="progresso">
                                <div class="progress progress-xs progress-striped active" >
                                  <div class="progress-bar progress-bar-green" style="width: {{$progressoCurso[$curso->id]}}%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-green">Concluído</span></td>
                            @else
                            <!--Existe registro na tabela UCUMP e dataConclusao checked-->
                            <td class="progresso">
                              <div class="progress progress-xs progress-striped active" >
                                <div class="progress-bar progress-bar-light-blue" style="width: {{$progressoCurso[$curso->id]}}%"></div>
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
                      <th rowspan="1" colspan="1">
                        ID
                      </th>
                      <th rowspan="1" colspan="1">
                        Curso
                      </th>
                      <th rowspan="1" colspan="1">
                        Nota Curso
                      </th>
                      <th rowspan="1" colspan="1">
                        Progresso
                      </th>
                      <th rowspan="1" colspan="1">
                        Status
                      </th>
                      <th rowspan="1" colspan="1">
                        Ações
                      </th>
                    </tr>
                    </tfoot>
                  </table>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@endpush

