@extends('layouts.app', ["current" => "cargos"])

@section('content')
    <div class="container">
    <div class="card">

        <div class="card-header">

            <h2>Lista de Cargos</h2>
        </div>
        <div class="card-body">

            @if(count($cargos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cargo</th>
                        <th>Salário Base</th>
                        <th>Usuário Atualização</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cargos as $cargo)
                        <tr>
                            <td>{{$cargo->id}}</td>
                            <td>{{$cargo->descricao}}</td>
                            <td>R$ {{$cargo->salarioBase}}</td>
                            @foreach ($users as $user)
                                @if($user->id == $cargo->usuarioAtualizacao)
                                    <td>{{$user->primeiroNome}} {{$user->ultimoNome}}</td>
                                @endif
                            @endforeach
                            <td>
                                <a href="/cargos/editar/{{$cargo->id}}" class="btn btn=sm btn-primary">Editar</a>
                                <a href="/cargos/apagar/{{$cargo->id}}" class="btn btn=sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/cargo/novo" class="btn btn=sm btn-primary">Novo Cargo</a>
        </div>
    </div>


    </div>

@endsection