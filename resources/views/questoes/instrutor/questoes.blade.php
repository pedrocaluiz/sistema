@extends('layouts.base', ["current" => "questoes"])

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
                                                    @if ($unidade->id == $q->unidade_id)
                                                        <td>{{$unidade->titulo}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$q->questao}}</td>
                                                <td>{{$q->respCorreta}}</td>
                                                <td>{{count($q->respostas)}}</td>
                                                <td>
                                                    <a href="/questoes/{{$q->id}}/edit" class="btn btn=sm btn-primary acaoTxt">@lang('messages.edit')</a>
                                                    <a href="/questoes/{{$q->id}}/edit" class="btn btn=sm btn-primary acaoIcon"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn=sm btn-danger acaoTxt" href="/questoes/{{$q->id}}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$q->id}}').submit();">
                                                        @lang('messages.delete')
                                                    </a>
                                                    <a class="btn btn=sm btn-danger acaoIcon"href="/questoes/{{$q->id}}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('delete-form-{{$q->id}}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{$q->id}}" action="/questoes/{{$q->id}}" method="POST" style="display: none;">
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
@endsection

