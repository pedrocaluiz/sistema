@extends('layouts.base', ["menu" => "listar", "current" => "tipodoc"]))

@section('header')
  @lang('messages.types-doc')
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

      tfoot  th:nth-child(4) {
        display: none;
      }

      #sigla {
        width: 10% !important;
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
  @lang('messages.types-doc')
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
                @if (count($tiposDoc) > 0)
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                          aria-label="ID: activate to sort column descending" style="width: 50px;">
                        ID
                      </th>
                      <th id="sigla" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Sigla: activate to sort column ascending" style="width: 60px;">
                        Sigla
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                          aria-label="Descrição: activate to sort column ascending" style="width: 245px;">
                        Descrição
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
                    @foreach ($tiposDoc as $tp)
                      <tr>
                        <td>{{$tp->id}}</td>
                        <td>{{$tp->siglaDocumento}}</td>
                        <td>{{$tp->descricao}}</td>
                        @foreach ($users as $user)
                          @if($user->id == $tp->usuarioAtualizacao)
                            <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                          @endif
                        @endforeach
                        <td>
                          <a href="/tipodoc/{{$tp->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                          <a href="/tipodoc/{{$tp->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                          <button class="btn btn=sm btn-danger acaoTxt" data-toggle="modal" data-target="#delete"
                                  data-tipodoc_id="{{$tp->id}}" id="excluir">
                              @lang('messages.delete')
                          </button>
                          <button class="btn btn=sm btn-danger acaoIcon" data-toggle="modal" data-target="#delete"
                                  data-tipodoc_id="{{$tp->id}}" id="excluir">
                              <i class="fa fa-trash"></i>
                          </button>
                        </td>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">
                        ID
                      </th>
                      <th rowspan="1" colspan="1">
                        Sigla
                      </th>
                      <th rowspan="1" colspan="1">
                        Descrição
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
            <a href="{{route('tipodoc.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.type-doc')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-danger fade" tabindex="-1" id="delete">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Excluir Tipo Doc.</h4>
              </div>
              <form id="delete-form" action="{{route('tipodoc.destroy')}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <p>Deseja realmente apagar esse registro?</p>
                      <input type="hidden" name="tipodoc_id" id="tipodoc_id" value="">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não, cancelar</button>
                      <button type="submit" class="btn btn=sm btn-danger">Sim, excluir</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        //tem que ser quando a página estiver carregada.
        $(document).ready(function(){
            $('#delete').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var tipodoc_id = button.data('tipodoc_id');
                var modal = $(this);
                modal.find('.modal-body #tipodoc_id').val(tipodoc_id);
            })
        });
    </script>

@endpush
