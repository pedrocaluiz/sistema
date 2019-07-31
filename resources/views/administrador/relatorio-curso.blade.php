@extends('layouts.base', ["current" => "relatorio-curso"])

@section('header')
  @lang('messages.course')
@endsection

@section('title')
  @lang('messages.course')
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
                @if (isset($curso))
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          id="id" aria-label="Ordem: activate to sort column descending" >
                        Ordem
                      </th>
                      <th id="nome" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Unidade: activate to sort column ascending" >
                        Unidade
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Progresso: activate to sort column ascending" >
                        Nota
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Status: activate to sort column ascending" >
                        Progresso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Nota Unidade: activate to sort column ascending" >
                        Status
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach($curso->unidades->sortBy('ordem') as $unidade)
                        @php
                          if ($unidade->usuario->where('id', $user->id)->first() !== null){
                             $notaUnidade = $unidade->usuario->where('id', $user->id)->first()->pivot->notaAval;
                          }
                        @endphp
                      <tr>
                        <td>{{$unidade->ordem}}</td>
                        <td>{{$unidade->titulo}}</td>
                        <td>
                        @if (empty($unidade->questoes[0]))
                            Sem aval.
                        @elseif (empty($notaUnidade)) 0.00
                          @else {{$notaUnidade}}
                        @endif
                        </td>

                        @forelse ($unidade->usuario->where('id', $user->id) as $user)
                          @if (empty($user->pivot->dataConclusao))
                            <!--Existe registro na tabela UCUMP, mas não existe dataConclusao-->
                            @if (count($unidade->materiais) > 0)

                                @if ($progresso[$unidade->id] == 0)
                                  <td class="progresso">
                                    <div class="progress progress-xs progress-striped active" >
                                      <div class="progress-bar progress-bar-red" style="width:5%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge bg-red">Em Andamento</span></td>
                                @else
                                  <td class="progresso">
                                    <div class="progress progress-xs progress-striped active" >
                                      <div class="progress-bar progress-bar-yellow" style="width: {{$progresso[$unidade->id]}}%"></div>
                                    </div>
                                  </td>
                                  <td><span class="badge bg-yellow">Em Andamento</span></td>
                                @endif
                            @else
                                <td class="progresso">
                                  <div class="progress progress-xs progress-striped active" >
                                    <div class="progress-bar progress-bar-light-blue" style="width: {{$progresso[$unidade->id]}}%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-blue">Falta Avaliação*</span></td>
                            @endif
                          @elseif (($unidade->provas->max('notaAval') > 7) or (empty($unidade->questoes[0])))

                            <!--Existe registro na tabela UCUMP e dataConclusao checked-->
                              <td class="progresso">
                                <div class="progress progress-xs progress-striped active" >
                                  <div class="progress-bar progress-bar-green" style="width: {{$progresso[$unidade->id]}}%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-green">Concluída</span></td>
                          @else

                            <!--Existe registro na tabela UCUMP e dataConclusao checked-->
                              <td class="progresso">
                                <div class="progress progress-xs progress-striped active" >
                                  <div class="progress-bar progress-bar-light-blue" style="width: {{$progresso[$unidade->id]}}%"></div>
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


                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">
                        ID
                      </th>
                      <th rowspan="1" colspan="1">
                        Unidade
                      </th>
                      <th rowspan="1" colspan="1">
                        Nota
                      </th>
                      <th rowspan="1" colspan="1">
                        Progresso
                      </th>
                      <th rowspan="1" colspan="1">
                        Status
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

