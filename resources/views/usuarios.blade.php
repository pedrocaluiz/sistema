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

        table#example1 td:nth-child(5), td:nth-child(6) {
            display: none;
        }

        thead th:nth-child(5), th:nth-child(6) {
            display: none;
        }

        tfoot th:nth-child(5), th:nth-child(6) {
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
                        Nome
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="E-mail: activate to sort column ascending" >
                        E-mail
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Matrícula: activate to sort column ascending" >
                        Matrícula
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Celular: activate to sort column ascending" >
                        Celular
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Função: activate to sort column ascending" >
                        Função
                      </th>
                      <th id="acao" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Ação: activate to sort column ascending" >
                        Ação
                      </th>
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->matricula}}</td>
                        <td>{{$user->celular}}</td>
                        @if (isset($funcoes))
                          @foreach ($funcoes as $funcao)
                            @if ($funcao->id == $user->funcao_id)
                              <td>{{$funcao->descricao}}</td>
                            @endif
                          @endforeach
                        @endif
                        <td>
                          <a href="/usuarios/{{$user->id}}/edit" class="btn btn=sm btn-primary acaoTxt">Editar</a>
                          <a href="/usuarios/{{$user->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                          <a class="btn btn=sm btn-danger acaoTxt" href="/usuarios/{{$user->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$user->id}}').submit();">
                            {{ __('Excluir') }}
                          </a>
                          <a class="btn btn=sm btn-danger acaoIcon"href="/usuarios/{{$user->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$user->id}}').submit();">
                            <i class="fa fa-trash"></i>
                          </a>
                          <form id="delete-form-{{$user->id}}" action="/usuarios/{{$user->id}}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                          </form>
                        </td>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">
                        ID
                      </th>
                      <th rowspan="1" colspan="1">
                        Nome
                      </th>
                      <th rowspan="1" colspan="1">
                        E-mail
                      </th>
                      <th rowspan="1" colspan="1">
                        Matrícula
                      </th>
                      <th rowspan="1" colspan="1">
                        Celular
                      </th>
                      <th rowspan="1" colspan="1">
                        Função
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
        <div class="box-footer d-flex justify-content-center">
          <div class="col-md-2">
            <a href="{{route('register')}}" type="button"  class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.user')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@endpush

