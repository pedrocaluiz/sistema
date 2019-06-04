@extends('layouts.app', ["current" => "cargos"])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Lista de Agências</h2>
            </div>
            <div class="card-body">
                @if(count($agencias) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Agência</th>
                            <th>SR</th>
                            <th>DIRE</th>
                            <th>Usuário Atualização</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($agencias as $agencia)
                            <tr>
                                <td>{{$agencia->id}}</td>
                                <td>{{$agencia->codigoUnidade}}</td>
                                <td>{{$agencia->descricao}}</td>
                                <td>{{$agencia->SR}}</td>
                                <td>{{$agencia->DIRE}}</td>
                                @foreach ($users as $user)
                                    @if($user->id == $agencia->usuarioAtualizacao)
                                        <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <a href="/agencias/editar/{{$agencia->id}}" class="btn btn=sm btn-primary">Editar</a>
                                    <a href="/agencias/apagar/{{$agencia->id}}" class="btn btn=sm btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer">
                <a href="/cargo/novo" class="btn btn=sm btn-primary">Nova Agência</a>
            </div>
        </div>
    </div>

@endsection