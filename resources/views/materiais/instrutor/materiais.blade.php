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
                                                    @if($unidade->id == $mat->unidade_id)
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
                                                    <a href="/materiais/instrutor/{{$mat->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                                                    <a href="/materiais/instrutor/{{$mat->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn=sm btn-danger acaoTxt" href="/materiais/instrutor/{{$mat->id}}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$mat->id}}').submit();">
                                                        @lang('messages.delete')
                                                    </a>
                                                    <a class="btn btn=sm btn-danger acaoIcon"href="/materiais/instrutor/{{$mat->id}}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$mat->id}}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{$mat->id}}" action="/materiais/instrutor/{{$mat->id}}" method="POST" style="display: none;">
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
                        <a href="{{route('materiais.instrutor.create')}}" type="button"  class="btn btn-primary botao" id="cadastro">
                            <i class="fa fa-plus"></i> &nbsp;&nbsp;@lang('messages.material')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

