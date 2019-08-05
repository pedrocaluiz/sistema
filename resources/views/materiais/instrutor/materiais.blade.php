@extends('layouts.base', ["current" => "materiais", "menu" => "listar"])

@section('header')
    @lang('messages.materials')
@endsection

@section('title')
    @lang('messages.materials')
@endsection

@push('css')

    <style>
        /*parte mobile*/
        @media(max-width: 997px){

            table#example1 td:nth-child(1), td:nth-child(5) {
                display: none;
            }

            thead th:nth-child(1), th:nth-child(5) {
                display: none;
            }

            tfoot th:nth-child(1), th:nth-child(5) {
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
                                @if(count($materiais) > 0)
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="ID: activate to sort column descending" style="width: 50px;">
                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Unidade: activate to sort column ascending" style="width: 245px;">
                                                Unidade
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Tipo Mat.: activate to sort column ascending" style="width: 245px;">
                                                Tipo Mat.
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Descrição: activate to sort column ascending" style="width: 245px;">
                                                Descrição
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Fonte: activate to sort column ascending" style="width: 245px;">
                                                Fonte
                                            </th>
                                            <th id="acoes" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ações: activate to sort column ascending" style="width: 245px;">
                                                Ações
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($materiais as $mat)
                                            <tr>
                                                <td>{{$mat->id}}</td>
                                                @foreach ($unidades as $unidade)
                                                    @if ($mat->unidade_id == null)
                                                        <td style="text-decoration: line-through;">Sem Unidade Associada</td>
                                                        @break
                                                    @elseif($unidade->id == $mat->unidade_id)
                                                        <td>{{$unidade->titulo}}</td>
                                                    @endif
                                                @endforeach
                                                @foreach ($tipo_mat as $tp)
                                                    @if($tp->id == $mat->material_id)
                                                        <td>{{$tp->descricao}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$mat->descricao}}</td>
                                                @if ($mat->storage == 1)
                                                    <td>Local</td>
                                                @else
                                                    <td>Web</td>
                                                @endif
                                                <td>
                                                    @php
                                                        $auth = Auth::user();
                                                        $adm = $auth->perfil->where('administrador', 1)->first();
                                                    @endphp
                                                    @if (($auth->id == $mat->usuarioAtualizacao) or isset($adm))
                                                        <a href="/materiais/{{$mat->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                                                        <a href="/materiais/{{$mat->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn=sm btn-danger acaoTxt" data-toggle="modal" data-target="#delete"
                                                                data-material_id="{{$mat->id}}" id="excluir">
                                                            @lang('messages.delete')
                                                        </button>
                                                        <button class="btn btn=sm btn-danger acaoIcon" data-toggle="modal" data-target="#delete"
                                                                data-material_id="{{$mat->id}}" id="excluir">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <a class="btn btn=sm btn-primary acaoTxt" disabled="">@lang('messages.edit')</a>
                                                        <a class="btn btn=sm btn-primary acaoIcon" disabled><i class="fa fa-edit" disabled></i></a>
                                                        <button class="btn btn=sm btn-danger acaoTxt" disabled
                                                                data-material_id="{{$mat->id}}" id="excluir">
                                                            @lang('messages.delete')
                                                        </button>
                                                        <button class="btn btn=sm btn-danger acaoIcon" disabled
                                                                data-material_id="{{$mat->id}}" id="excluir">
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
                                                Tipo Mat.
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Descrição
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Fonte
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
                        <a href="{{route('materiais.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
                            <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.material')
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
                    <h4 class="modal-title">Excluir Material</h4>
                </div>
                <form id="delete-form" action="{{route('materiais.destroy')}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Deseja realmente apagar esse registro?</p>
                        <input type="hidden" name="material_id" id="material_id" value="">
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
                var material_id = button.data('material_id');
                var modal = $(this);
                modal.find('.modal-body #material_id').val(material_id);
            })
        });
    </script>

@endpush

