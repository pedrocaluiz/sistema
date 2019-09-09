@extends('layouts.base', ["menu" => "listar", "current" => "usuarios"])

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
                      <th>ID</th>
                      <th id="nome">Nome</th>
                      <th>E-mail</th>
                      <th>Matrícula</th>
                      <th>Função</th>
                      <th id="acoes3">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->matricula}}</td>
                        @if (isset($funcoes))
                          @foreach ($funcoes as $funcao)
                              @if ($user->funcao_id == null)
                                <td style="text-decoration: line-through;">Sem Função</td>
                                @break
                              @elseif ($funcao->id == $user->funcao_id)
                                <td>{{$funcao->descricao}}</td>
                             @endif
                          @endforeach
                        @endif
                        <td id="data-acoes">
                          <a href="/usuarios/relatorio/{{$user->id}}" class="btn btn=sm btn-info acaoTxt">Relatório</a>
                          <a href="/usuarios/relatorio/{{$user->id}}" class="btn btn=sm btn-info acaoIcon"><i class="fa fa-list-ul"></i></a>

                                @php $perfil = $user->perfil->where('descricao', 'Instrutor')->first(); @endphp
                            @if (empty($perfil))
                                <a class="btn btn=sm btn-success acaoTxt "href="/usuarios/instrutor/{{$user->id}}" style="min-width: 124px"
                                   onclick="event.preventDefault();
                                       document.getElementById('instrutor-form-{{$user->id}}').submit();">
                                    Tornar Instrutor
                                </a>
                                <a class="btn btn=sm btn-success acaoIcon "href="/usuarios/instrutor/{{$user->id}}"
                                   onclick="event.preventDefault();
                                       document.getElementById('instrutor-form-{{$user->id}}').submit();">
                                    <i class="fa fa-mortar-board"></i>
                                </a>
                                <form id="instrutor-form-{{$user->id}}" action="/usuarios/instrutor/{{$user->id}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="btn btn=sm btn-warning acaoTxt "href="/usuarios/aluno/{{$user->id}}" style="min-width: 124px"
                                   onclick="event.preventDefault();
                                       document.getElementById('aluno-form-{{$user->id}}').submit();">
                                    Remov. Instrutor
                                </a>
                                <a class="btn btn=sm btn-warning acaoIcon "href="/usuarios/aluno/{{$user->id}}"
                                   onclick="event.preventDefault();
                                       document.getElementById('aluno-form-{{$user->id}}').submit();">
                                    <i class="fa fa-mortar-board"></i>
                                </a>
                                <form id="aluno-form-{{$user->id}}" action="/usuarios/aluno/{{$user->id}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif

                            <button class="btn btn=sm btn-danger acaoTxt" data-toggle="modal" data-target="#delete"
                                data-user_id="{{$user->id}}" id="excluir">
                               <i class="fa fa-trash"></i>
                            </button>
                            <button class="btn btn=sm btn-danger acaoIcon" data-toggle="modal" data-target="#delete"
                                    data-user_id="{{$user->id}}" id="excluir">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Matrícula</th>
                      <th>Função</th>
                      <th>Ações</th>
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

  <div class="modal modal-danger fade" tabindex="-1" id="delete">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Excluir Usuário</h4>
              </div>
              <form id="delete-form" action="{{route('usuarios.destroy')}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <p>Deseja realmente apagar esse registro?</p>
                      <input type="hidden" name="user_id" id="user_id" value="">
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
            var user_id = button.data('user_id');
            var modal = $(this);
            modal.find('.modal-body #user_id').val(user_id);
        })
    });
</script>

@endpush

