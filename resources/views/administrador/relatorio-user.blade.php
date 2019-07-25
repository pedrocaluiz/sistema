@extends('layouts.base', ["current" => "usuarios"])

@section('header')
  @lang('messages.users')
@endsection

@section('title')
  @lang('messages.users')
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
                @if (isset($users))
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          id="id" aria-label="ID: activate to sort column descending" >
                        ID
                      </th>
                      <th id="nome" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Nome: activate to sort column ascending" >
                        Curso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="E-mail: activate to sort column ascending" >
                        Progresso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Matrícula: activate to sort column ascending" >
                        Nota Curso
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Função: activate to sort column ascending" >
                        Concluído
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
                        <td>Progresso ...</td>
                        <td>Nota 10.00</td>
                        <td>Concluído / Em Andamento</td>
                        <td>
                          <a href="/usuarios/relatorio/{{Auth::user()->id}}/curso/{{$curso->id}}" class="btn btn=sm btn-info acaoTxt">Detalhes</a>
                          <a href="/usuarios/relatorio/{{Auth::user()->id}}/curso/{{$curso->id}}" class="btn btn=sm btn-info acaoIcon"><i class="fa fa-list-ul"></i></a>
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
                        Progresso
                      </th>
                      <th rowspan="1" colspan="1">
                        Nota Curso
                      </th>
                      <th rowspan="1" colspan="1">
                        Concluído
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

