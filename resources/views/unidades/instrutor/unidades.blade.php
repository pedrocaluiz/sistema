@extends('layouts.base', ["current" => "unidades", "menu" => "listar"])

@section('header')
    @lang('messages.units')
@endsection

@section('title')
    @lang('messages.units')
@endsection

@push('css')

    <style>
        /*parte mobile*/
        @media(max-width: 997px){

            table#example1 td:nth-child(1), td:nth-child(4), td:nth-child(5) {
                display: none;
            }

            thead th:nth-child(1), th:nth-child(4), th:nth-child(5) {
                display: none;
            }

            tfoot th:nth-child(1), th:nth-child(4), th:nth-child(5) {
                display: none;
            }
        }

        /*parte mobile usuarios*/
        @media(max-width: 1335px){

            table#example1 td:nth-child(3){
                display: none;
            }

            thead th:nth-child(3){
                display: none;
            }

            tfoot th:nth-child(3){
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
                                @if(count($unidades) > 0)
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th style="width: 50px;">ID</th>
                                            <th>Curso</th>
                                            <th>Título</th>
                                            <th>Ordem</th>
                                            <th>Usuário Atualização</th>
                                            <th id="acoes">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($unidades as $u)
                                            <tr>
                                                <td>{{$u->id}}</td>
                                                @foreach ($cursos as $curso)
                                                    @if ($u->curso_id == null)
                                                        <td style="text-decoration: line-through;">Sem Curso Associado</td>
                                                        @break
                                                    @elseif ($curso->id == $u->curso_id)
                                                        <td>{{$curso->titulo}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$u->titulo}}</td>
                                                <td>{{$u->ordem}}</td>
                                                @foreach ($users as $user)
                                                    @if($user->id == $u->usuarioAtualizacao)
                                                        <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                                                    @endif
                                                @endforeach
                                                <td id="data-acoes">
                                                    @php
                                                        $auth = Auth::user();
                                                        $adm = $auth->perfil->where('administrador', 1)->first();
                                                    @endphp
                                                    @if (($auth->id == $u->usuarioAtualizacao) or isset($adm))
                                                        <a href="/unidades/{{$u->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                                                        <a href="/unidades/{{$u->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn=sm btn-danger acaoTxt" data-toggle="modal" data-target="#delete"
                                                                data-unidade_id="{{$u->id}}" id="excluir">
                                                            @lang('messages.delete')
                                                        </button>
                                                        <button class="btn btn=sm btn-danger acaoIcon" data-toggle="modal" data-target="#delete"
                                                                data-unidade_id="{{$u->id}}" id="excluir">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <a class="btn btn=sm btn-primary acaoTxt" disabled="">@lang('messages.edit')</a>
                                                        <a class="btn btn=sm btn-primary acaoIcon" disabled><i class="fa fa-edit" disabled></i></a>
                                                        <button class="btn btn=sm btn-danger acaoTxt" disabled
                                                                data-unidade_id="{{$u->id}}" id="excluir">
                                                            @lang('messages.delete')
                                                        </button>
                                                        <button class="btn btn=sm btn-danger acaoIcon" disabled
                                                                data-unidade_id="{{$u->id}}" id="excluir">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cursos</th>
                                            <th>Título</th>
                                            <th>Ordem</th>
                                            <th>Usuário Atualização</th>
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
                        <a href="{{route('unidades.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
                            <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.unity')
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
                    <h4 class="modal-title">Excluir Unidade</h4>
                </div>
                <form id="delete-form" action="{{route('unidades.destroy')}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Deseja realmente apagar esse registro?</p>
                        <input type="hidden" name="unidade_id" id="unidade_id" value="">
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
                var unidade_id = button.data('unidade_id');
                var modal = $(this);
                modal.find('.modal-body #unidade_id').val(unidade_id);
            })
        });
    </script>

@endpush

