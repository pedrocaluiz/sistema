@extends('layouts.base', ["current" => "perfis"])

@section('header')
  @lang('messages.profiles')
@endsection

@push('css')

  <style>
    /*parte mobile*/
    @media(max-width: 997px){

      table#example1 td:nth-child(1), td:nth-child(3) {
        display: none;
      }

      thead th:nth-child(1), th:nth-child(3) {
        display: none;
      }

      tfoot th:nth-child(1), th:nth-child(3) {
        display: none;
      }

      #descricao {
        width: 40% !important;
      }
    }

    /*parte mobile usuarios*/
    @media(max-width: 1335px){

      table#example1 td:nth-child(5){
        display: none;
      }

      thead th:nth-child(5) {
        display: none;
      }

      tfoot th:nth-child(5) {
        display: none;
      }
    }
  </style>
@endpush

@section('title')
  @lang('messages.profiles')
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
                @if (count($perfis) > 0)
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          aria-label="ID: activate to sort column descending" style="width: 50px;">
                        ID
                      </th>
                      <th id="descricao" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Descrição: activate to sort column ascending" style="width: 245px;">
                        Descrição
                      </th>
                      <th id="administrador" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Adminsitrador: activate to sort column ascending" style="width: 245px;">
                        Adminsitrador
                      </th>
                      <th id="ativo" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Ativo: activate to sort column ascending" style="width: 245px;">
                        Ativo
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Usuário Atualização: activate to sort column ascending" style="width: 245px;">
                        Usuário Atualização
                      </th>
                      <th id="acoes" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Ações: activate to sort column ascending" style="width: 245px;">
                        Ações
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($perfis as $perfil)
                      <tr>
                        <td>{{$perfil->id}}</td>
                        <td>{{$perfil->descricao}}</td>
                        @if ($perfil->administrador == 1)
                          <td>Sim</td>
                        @else
                          <td>Não</td>
                        @endif
                        @if ($perfil->ativo == 1)
                          <td>Sim</td>
                        @else
                          <td>Não</td>
                        @endif
                        @foreach ($users as $user)
                          @if($user->id == $perfil->usuarioAtualizacao)
                            <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                          @endif
                        @endforeach
                        <td>
                          <a href="/perfis/{{$perfil->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                          <a href="/perfis/{{$perfil->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                          <a class="btn btn=sm btn-danger acaoTxt" href="/perfis/{{$perfil->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$perfil->id}}').submit();">
                            @lang('messages.delete')
                          </a>
                          <a class="btn btn=sm btn-danger acaoIcon" href="/perfis/{{$perfil->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$perfil->id}}').submit();">
                            <i class="fa fa-edit"></i>
                          </a>
                          <form id="delete-form-{{$perfil->id}}" action="/perfis/{{$perfil->id}}" method="POST" style="display: none;">
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
                        Administrador
                      </th>
                      <th rowspan="1" colspan="1">
                        Ativo
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
            <a href="/perfis/create" type="button"  class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.profile')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection