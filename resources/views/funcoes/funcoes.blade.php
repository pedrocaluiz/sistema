@extends('layouts.base', ["menu" => "listar", "current" => "funcoes"])

@section('header')
  @lang('messages.functions')
@endsection

@push('css')
  <style>
    /*parte mobile*/
    @media(max-width: 997px){

      table#example1 td:nth-child(3), td:nth-child(4), td:nth-child(5){
        display: none;
      }

      thead th:nth-child(3), th:nth-child(4), th:nth-child(5) {
        display: none;
      }

      tfoot  th:nth-child(3), th:nth-child(4), th:nth-child(5) {
        display: none;
      }
    }

    /*parte mobile usuarios*/
    @media(max-width: 1135px){

      table#example1 td:nth-child(1){
        display: none;
      }

      thead th:nth-child(1) {
        display: none;
      }

      tfoot th:nth-child(1) {
        display: none;
      }
    }
  </style>
@endpush

@section('title')
  @lang('messages.functions')
@endsection

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
                @if (count($funcoes) > 0)
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          aria-label="ID: activate to sort column descending" style="width: 50px;">
                        ID
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Descrição: activate to sort column ascending" style="width: 400px;">
                        Descrição
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Valor Função: activate to sort column ascending" style="width: 150px;">
                        Valor Função
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Piso Salarial: activate to sort column ascending" style="width: 150px;">
                        Piso Salarial
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Usuário Atualização: activate to sort column ascending" style="width: 245px;">
                        Usuário Atualização
                      </th>
                      <th id="acoes" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Ações: activate to sort column ascending" style="width: 245px;">
                        Ações
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($funcoes as $funcao)
                      <tr>
                        <td>{{$funcao->id}}</td>
                        <td>{{$funcao->descricao}}</td>
                        <td>R$ {{number_format($funcao->valorFuncao, 2, ',', '.')}}</td>
                        <td>R$ {{number_format($funcao->pisoSalarial, 2, ',', '.')}}</td>
                        @foreach ($users as $user)
                          @if($user->id == $funcao->usuarioAtualizacao)
                            <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                          @endif
                        @endforeach
                        <td>
                          <a href="/funcoes/{{$funcao->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                          <a href="/funcoes/{{$funcao->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                          <a class="btn btn=sm btn-danger acaoTxt" href="/funcoes/{{$funcao->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$funcao->id}}').submit();">
                            @lang('messages.delete')
                          </a>
                          <a class="btn btn=sm btn-danger acaoIcon" href="/funcoes/{{$funcao->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$funcao->id}}').submit();">
                            <i class="fa fa-edit"></i>
                          </a>
                          <form id="delete-form-{{$funcao->id}}" action="/funcoes/{{$funcao->id}}" method="POST" style="display: none;">
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
                        Cargo
                      </th>
                      <th rowspan="1" colspan="1">
                        Valor Função
                      </th>
                      <th rowspan="1" colspan="1">
                        Piso Salarial
                      </th>
                      <th rowspan="1" colspan="1">
                        Usuário Atualização
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
            <a href="{{route('funcoes.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.function')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
