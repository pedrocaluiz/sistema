@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col col-md-6 ">
            <div class="jumbotron">
                <h1 class="display-3">Olá, {{ Auth::user()->primeiroNome }}</h1>
                <p class="lead">Você fez Login com sucesso!</p>
                <hr class="my-4">
                <p>Navegue pelos seus cursos.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/register" role="button">Meus Cursos</a>
                </p>
            </div>
        </div>



    </div>
</div>


@endsection

