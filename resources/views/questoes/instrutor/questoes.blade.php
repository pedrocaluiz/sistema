@extends('layouts.base', ["current" => "questoes", "menu" => "listar"])

@section('header')
    @lang('messages.questions')
@endsection

@section('title')
    @lang('messages.questions')
@endsection

@push('css')

    <style>
        /*parte mobile*/
        @media(max-width: 997px){

            table#example1 td:nth-child(1), td:nth-child(4) {
                display: none;
            }

            thead th:nth-child(1), th:nth-child(4) {
                display: none;
            }

            tfoot th:nth-child(1), th:nth-child(4) {
                display: none;
            }
        }

        /*parte mobile usuarios*/
        @media(max-width: 1335px){

            table#example1 td:nth-child(2), td:nth-child(5){
                display: none;
            }

            thead th:nth-child(2), th:nth-child(5){
                display: none;
            }

            tfoot th:nth-child(2), th:nth-child(5){
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
                        @if (!empty($warning))
                            <div class="row" style="display: flex; justify-content: space-around">
                                <div class="col-md-6">
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> {{$warning}}</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                @if(count($questoes) > 0)
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="ID: activate to sort column descending" >
                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Curso: activate to sort column ascending" >
                                                Unidade
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Unidade: activate to sort column ascending" >
                                                Questão
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ícone: activate to sort column ascending" >
                                                Resp. Correta
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Qtde Respostas: activate to sort column ascending" >
                                                Qtde Incorretas
                                            </th>
                                            <th id="acoes" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ações: activate to sort column ascending" >
                                                Ações
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($questoes as $q)
                                            <tr>
                                                <td>{{$q->id}}</td>
                                                @foreach ($unidades as $unidade)
                                                    @if ($q->unidade_id == null)
                                                        <td style="text-decoration: line-through;">Sem Unidade Associada</td>
                                                        @break
                                                    @elseif ($unidade->id == $q->unidade_id)
                                                        <td>{{$unidade->titulo}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$q->questao}}</td>
                                                @foreach ($respostas as $resp)
                                                    @if ($q->respCorreta_id == null)
                                                        <td style="text-decoration: line-through;">Sem Correta Associada</td>
                                                        @break
                                                    @elseif ($resp->id == $q->respCorreta_id)
                                                        <td>{{$resp->resposta}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{count($q->respostas)}}</td>
                                                <td>
                                                    @php
                                                        $auth = Auth::user();
                                                        $adm = $auth->perfil->where('administrador', 1)->first();
                                                    @endphp
                                                    @if (($auth->id == $q->usuarioAtualizacao) or isset($adm))
                                                        <a href="/questoes/{{$q->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                                                        <a href="/questoes/{{$q->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn=sm btn-danger acaoTxt" data-toggle="modal" data-target="#delete"
                                                                data-questao_id="{{$q->id}}" id="excluir">
                                                            @lang('messages.delete')
                                                        </button>
                                                        <button class="btn btn=sm btn-danger acaoIcon" data-toggle="modal" data-target="#delete"
                                                                data-questao_id="{{$q->id}}" id="excluir">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <a class="btn btn=sm btn-primary acaoTxt" disabled="">@lang('messages.edit')</a>
                                                        <a class="btn btn=sm btn-primary acaoIcon" disabled><i class="fa fa-edit" disabled></i></a>
                                                        <button class="btn btn=sm btn-danger acaoTxt" disabled id="excluir">
                                                            @lang('messages.delete')
                                                        </button>
                                                        <button class="btn btn=sm btn-danger acaoIcon" disabled id="excluir">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
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
                                                Questão
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Resp. Correta
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Qtde Incorretas
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
                <div class="box-footer">
                    <div class="col-md-2">
                        <a href="{{route('questoes.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
                            <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.question')
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
                    <h4 class="modal-title">Excluir Questão</h4>
                </div>
                <form id="delete-form" action="{{route('questoes.destroy')}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Deseja realmente apagar esse registro?</p>
                        <input type="hidden" name="questao_id" id="questao_id" value="">
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
                var questao_id = button.data('questao_id');
                var modal = $(this);
                modal.find('.modal-body #questao_id').val(questao_id);
            })
        });
    </script>

@endpush

