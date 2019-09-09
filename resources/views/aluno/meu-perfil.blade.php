@extends('layouts.base', ["current" => "meu-perfil"])

@section('header')
  @lang('messages.user')
@endsection

@section('title')
  @lang('messages.user')
@endsection

@push('css')
<!-- CSS HERE -->



<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="{{asset('css/profile/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/profile/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('css/profile/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('css/profile/estilo.css')}}">

<style>
    /*parte mobile*/

    .d-center{
        display: flex;
        justify-content: center;
    }

    .img-rounded{
        max-width: 100%;
    }

    @media(max-width: 997px){

        .hero-text h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .hero-text p {
            font-size: 20px;
        }

        .social-links a {
            font-size: 30px;
            margin-right: 15px;
        }

        .hero-info ul li {
            font-size: 20px;
        }

        #nome {
            width: 60% !important;
        }
    }
</style>
@endpush

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12 perfil">
        <section class="hero-section">
            <div class="container-fluid text-center">
                @if ($user->foto != null)
                    <img src="/storage/{{$user->foto}}" alt="user-img" class="img-rounded">
                @endif
                <div class="hero-text">
                    <h2>{{$user->primeiroNome}} {{$user->ultimoNome}}</h2>
                    <div class="row d-center">
                        <div class="col-md-2" style="min-width: 230px">
                            <p class="d-center">
                                <a href="/usuarios/relatorio/{{$user->id}}" class="btn btn=sm btn-info botao" type="submit" style="width: 200px">
                                    Relatório
                                </a>
                            </p>
                        </div>
                    </div>
                    <p>I’m a digital designer in love with photography, painting and<br>discovering new worlds and cultures.</p>
                </div>
                <div class="social-links">
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </section>
        <div class="info-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 container-warp">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero-info mb-4 mb-md-0">
                                    <ul>
                                        <li>Data de Nascimento: {{date('d-m-Y', strtotime($user->dataNascimento)) }}</li>
                                        <li>Local: {{$user->municipio->descricao}}, {{$user->municipio->estado->descricao}}</li>
                                    </ul>
                                </div>
                                <p class="d-center" style="max-width: 200px">
                                    <a href="/usuarios/{{$user->id}}/edit" class="btn btn=sm btn-info botao" type="submit" style="width: 200px">
                                        Editar Perfil
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="hero-info">
                                    <ul>
                                        <li>E-mail: {{$user->email}}</li>
                                        <li>Phone: +55 {{$user->telefone}}</li>
                                        <li>Celular: +55 {{$user->celular}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
@endpush

