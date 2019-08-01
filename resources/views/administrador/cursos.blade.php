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
                                    <div class="alert alert-warning alert-dismissible">
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
                                                aria-label="Categoria: activate to sort column ascending" style="width: 245px;">
                                                Categoria
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Título.: activate to sort column ascending" style="width: 245px;">
                                                Título
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ícone: activate to sort column ascending" style="width: 245px;">
                                                Ícone
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Instrutor: activate to sort column ascending" style="width: 245px;">
                                                Instrutor
                                            </th>
                                            <th id="acoes" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Ações: activate to sort column ascending" style="width: 245px;">
                                                Ações
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cursos as $c)
                                            <tr>
                                                <td>{{$c->id}}</td>
                                                @foreach ($categorias as $categoria)
                                                    @if ($categoria->id == $c->categoria_id)
                                                        <td>{{$categoria->descricao}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$c->titulo}}</td>
                                                <td><i class="{{$c->icone}}"></i></td>
                                                @foreach ($users as $user)
                                                    @if($user->id == $c->usuarioAtualizacao)
                                                        <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                                                    @endif
                                                @endforeach
                                                <td>
                                                @if ($c->ativo == 0)
                                                    <a class="btn btn=sm btn-success acaoTxt" href="/cursos/enable/{{$c->id}}" style="min-width: 80px"
                                                       onclick="event.preventDefault();
                                                           document.getElementById('enable-form-{{$c->id}}').submit();">
                                                        Publicar
                                                    </a>
                                                    <a class="btn btn=sm btn-success acaoIcon"href="/cursos/enable/{{$c->id}}"
                                                       onclick="event.preventDefault();
                                                           document.getElementById('enable-form-{{$c->id}}').submit();">
                                                        <i class="fa fa-level-up"></i>
                                                    </a>
                                                    <form id="enable-form-{{$c->id}}" action="/cursos/enable/{{$c->id}}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @else
                                                    <a class="btn btn=sm btn-warning acaoTxt" href="/cursos/disable/{{$c->id}}" style="min-width: 80px"
                                                       onclick="event.preventDefault();
                                                           document.getElementById('disable-form-{{$c->id}}').submit();">
                                                        Desativar
                                                    </a>
                                                    <a class="btn btn=sm btn-warning acaoIcon"href="/cursos/disable/{{$c->id}}"
                                                       onclick="event.preventDefault();
                                                           document.getElementById('disable-form-{{$c->id}}').submit();">
                                                        <i class="fa fa-level-down"></i>
                                                    </a>
                                                    <form id="disable-form-{{$c->id}}" action="/cursos/disable/{{$c->id}}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endif
                                                    <a class="btn btn=sm btn-danger acaoTxt" href="/cursos/{{$c->id}}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$c->id}}').submit();">
                                                        @lang('messages.delete')
                                                    </a>
                                                    <a class="btn btn=sm btn-danger acaoIcon"href="/cursos/{{$c->id}}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$c->id}}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{$c->id}}" action="/cursos/{{$c->id}}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
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
                        <a href="{{route('cursos.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
                            <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.course')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

