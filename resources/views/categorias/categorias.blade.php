@extends('layouts.base', ["current" => "categorias"])

@section('header')
  @lang('messages.categories')
@endsection

@push('css')
  <style>
    /*parte mobile*/
    @media(max-width: 997px){

      table#example1 td:nth-child(4){
        display: none;
      }

      thead th:nth-child(4) {
        display: none;
      }

      tfoot th:nth-child(4) {
        display: none;
      }
    }

    /*parte mobile usuarios*/
    @media(max-width: 1335px){

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
  @lang('messages.categories')
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
                @if (count($cats) > 0)
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          aria-label="ID: activate to sort column descending" style="width: 50px;">
                        ID
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Descrição: activate to sort column ascending" style="width: 245px;">
                        Descrição
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Ícone: activate to sort column ascending" style="width: 60px;">
                        Ícone
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
                    @foreach ($cats as $cat)
                      <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->descricao}}</td>
                        <td> <i class="{{$cat->icone}}"></i></td>
                        @foreach ($users as $user)
                          @if($user->id == $cat->usuarioAtualizacao)
                            <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                          @endif
                        @endforeach
                        <td>
                          <a href="/categorias/{{$cat->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                          <a href="/categorias/{{$cat->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                          <a class="btn btn=sm btn-danger acaoTxt" href="/categorias/{{$cat->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$cat->id}}').submit();">
                            @lang('messages.delete')
                          </a>
                          <a class="btn btn=sm btn-danger acaoIcon" href="/categorias/{{$cat->id}}"
                             onclick="event.preventDefault();
                                     document.getElementById('delete-form-{{$cat->id}}').submit();">
                            <i class="fa fa-edit"></i>
                          </a>
                          <form id="delete-form-{{$cat->id}}" action="/categorias/{{$cat->id}}" method="POST" style="display: none;">
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
                        Descrição
                      </th>
                      <th rowspan="1" colspan="1">
                        Ícone
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
        <div class="box-footer d-flex justify-content-center">
          <div class="col-md-2">
            <a href="{{route('categorias.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.category')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
@endsection