@extends('layouts.base', ["current" => "home"])

@push('css')
<style></style>
@endpush

@section('title')
    Home
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header home-box">
                    <h1>Olá, {{Auth::user()->primeiroNome}}!</h1>
                </div>
                <div class="box-body home-box">
                    @if(isset(Auth::user()->perfil[0]))
                        <h3>Você está logado como
                            @if (count(Auth::user()->perfil) > 1)
                                @foreach(Auth::user()->perfil as $perfil)
                                    @if ($loop->last)
                                        <strong>{{$perfil->descricao}}</strong>.
                                    @else
                                        <strong>{{$perfil->descricao}}</strong> e
                                    @endif
                                @endforeach
                            @else
                                <strong>{{Auth::user()->perfil[0]->descricao}}</strong>
                            @endif
                        </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($categorias))
                        <h3>{{$categorias->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Categorias</p>
                    <p>Registradas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-object-group"></i>
                </div>
                <a href="{{route('categorias')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($agencias))
                        <h3>{{$agencias->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Agências</p>
                    <p>Registradas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bank"></i>
                </div>
                <a href="{{route('agencias')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($users))
                        <h3>{{$users->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Usuários</p>
                    <p>Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{route('usuarios')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($cargos))
                        <h3>{{$cargos->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Cargos</p>
                    <p>Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bar-chart"></i>
                </div>
                <a href="{{route('cargos')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($funcoes))
                        <h3>{{$funcoes->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Funções</p>
                    <p>Registradas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-line-chart"></i>
                </div>
                <a href="{{route('funcoes')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($tipoDoc))
                        <h3>{{$tipoDoc->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Tipos Doc.</p>
                    <p>Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="{{route('tipodoc')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($cursos))
                        <h3>{{$cursos->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Cursos</p>
                    <p>Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-zip-o"></i>
                </div>
                <a href="{{route('cursos')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($unidades))
                        <h3>{{$unidades->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Unidades</p>
                    <p>Registradas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-zip-o"></i>
                </div>
                <a href="{{route('unidades')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($materiais))
                        <h3>{{$materiais->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Materiais</p>
                    <p>Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-zip-o"></i>
                </div>
                <a href="{{route('materiais.instrutor')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-white">
                <div class="inner">
                    @if (isset($questoes))
                        <h3>{{$questoes->count()}}</h3>
                    @else
                        <h3>00</h3>
                    @endif
                    <p>Questões</p>
                    <p>Registradas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-zip-o"></i>
                </div>
                <a href="{{route('questoes')}}" class="small-box-footer">
                    Mais detalhes <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->



    </div>

    <!--
    <div class="row">
        <div class="video">
            <iframe class="video" src="https://www.youtube.com/embed/nFNrkmYN8xE" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
    </div>

    <div class="row">
        <div class="video">
            <iframe class="video"
                    src="https://www.youtube.com/watch?v=nFNrkmYN8xE" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>


    <div class="row">
        <div class="video" >
        <video class="video" controls>
            <source src="/storage/{{Auth::user()->foto}}" type="video/mp4">
        </video>
        </div>
    </div>

 -->
@endsection


