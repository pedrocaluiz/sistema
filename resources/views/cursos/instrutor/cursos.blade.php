@extends('layouts.base', ["current" => "cursos", "menu" => "listar"])

@section('header')
    @lang('messages.courses')
@endsection

@section('title')
    @lang('messages.courses')
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
        .td-flex {
            display: flex;
            justify-content: space-between;
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
                                @if(count($cursos) > 0)
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="ID: activate to sort column descending" style="width: 50px;">
                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Categoria: activate to sort column ascending" >
                                                Categoria
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Título.: activate to sort column ascending" >
                                                Título
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ícone: activate to sort column ascending" >
                                                Ícone
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Instrutor: activate to sort column ascending" >
                                                Instrutor
                                            </th>
                                            <th id="acoes" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ações: activate to sort column ascending" >
                                                Ações
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cursos as $c)
                                            <tr>
                                                <td>{{$c->id}}</td>
                                                @foreach ($categorias as $categoria)
                                                    @if ($c->categoria_id == null)
                                                        <td style="text-decoration: line-through;">Sem Categoria Associado</td>
                                                        @break
                                                    @elseif ($categoria->id == $c->categoria_id)
                                                        <td>{{$categoria->descricao}}</td>
                                                    @endif
                                                @endforeach
                                                <td class="td-flex">{{$c->titulo}}  @if (Auth::user()->id == $c->usuarioAtualizacao) <a href="/cursos/{{$c->id}}">Ir <i class="fa fa-level-up"></i></a>@endif</td>
                                                <td><i class="{{$c->icone}}"></i></td>
                                                @foreach ($users as $user)
                                                    @if($user->id == $c->usuarioAtualizacao)
                                                        <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                                                    @endif
                                                @endforeach

                                                <td>
                                                    @php
                                                        $perfil = $user->perfil->where('descricao', 'Instrutor')->first();
                                                        $auth = Auth::user();
                                                    @endphp
                                                    <a @if ($auth->id != $c->usuarioAtualizacao) href="#" disabled @else href="/cursos/{{$c->id}}/edit" @endif
                                                        class="btn btn=sm btn-primary acaoTxt"> @lang('messages.edit')</a>
                                                    <a @if ($auth->id != $c->usuarioAtualizacao) href="#" disabled @else href="/cursos/{{$c->id}}/edit" @endif
                                                        class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>

                                                    <button @if ($auth->id != $c->usuarioAtualizacao) href="#" disabled @else data-toggle="modal" data-target="#delete" @endif
                                                        class="btn btn=sm btn-danger acaoTxt" data-curso_id="{{$c->id}}" id="excluir">@lang('messages.delete')
                                                    </button>
                                                    <button @if ($auth->id != $c->usuarioAtualizacao) href="#" disabled @else data-toggle="modal" data-target="#delete" @endif
                                                        class="btn btn=sm btn-danger acaoIcon" data-curso_id="{{$c->id}}" id="excluir"><i class="fa fa-trash"></i>
                                                    </button>
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
                                                Categoria
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Título
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Ícone
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Instrutor
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
                        <a href="{{route('cursos.create')}}" type="button" class="btn btn-primary botao" id="cadastro">
                            <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.course')
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
                    <h4 class="modal-title">Excluir Curso</h4>
                </div>
                <form id="delete-form" action="{{route('cursos.destroy')}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Deseja realmente apagar esse registro?</p>
                        <input type="hidden" name="curso_id" id="curso_id" value="">
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
                var curso_id = button.data('curso_id');
                var modal = $(this);
                modal.find('.modal-body #curso_id').val(curso_id);
            })
        });
    </script>
@endpush

