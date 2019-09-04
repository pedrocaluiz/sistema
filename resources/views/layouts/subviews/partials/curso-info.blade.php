<form class="cadastro" id="formCurso" action="/cursos/{{$curso->id}}/pdf" method="POST">
    @csrf
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
    @if (!empty($alterada))
        <div class="row" style="display: flex; justify-content: space-around">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{$alterada}}</h4>
                </div>
            </div>
        </div>
    @endif
    <div class="box">
        <div class="box-header curso">

            <i class="{{$curso->icone}}"></i>
            <h1 class="box-title">{{$curso->titulo}}</h1>
        </div>
        <div class="box-body box-curso">

            <h2>{{$curso->descricao}}</h2>
            <div class="row" style="margin-top: 40px">
                <div class="col-md-12" style="display: flex; justify-content: space-between">
                    <p>Categoria do Curso: <strong>{{$cat->descricao}}</strong></p>
                    <p>Instrutor do Curso: <strong>{{ $user->primeiroNome }} {{ $user->ultimoNome }}</strong></p>
                </div>
            </div>
            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" id="curso_id" name="curso_id" value="{{$curso->id}}">
        </div>
        <div class="box-footer">
            <div class="col-md-2" id="inscrito">

                @php $perfis = Auth::user()->perfil; @endphp
                @foreach ($perfis as $perfil)
                    @if ($perfil->administrador == 1 or Auth::user()->id == $curso->usuarioAtualizacao)
                        <p class="d-center">
                            <a href="/cursos/{{$curso->id}}/ratings" class="btn btn=sm btn-info botao" type="submit">
                                Avaliações do Curso
                            </a>
                        </p>
                        @break
                    @else
                        @if (isset($user_curso[0]))
                            <p class="d-center"><strong>Você já está inscrito</strong></p>
                            <p class="d-center">
                                <button class="btn btn=sm btn-danger botao" type="submit">
                                    <i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Certificado
                                </button>
                            </p>
                            <p class="d-center">
                                <a href="/cursos/{{$curso->id}}/rating" class="btn btn=sm btn-info botao" type="submit">
                                    Avalie o Curso
                                </a>
                            </p>
                            @break
                        @else
                            <button type="button" class="btn btn-primary botao" id="btnInscrever" onclick="inscrever()">
                                <i class="fa fa-plus"></i> &nbsp;&nbsp;Inscrever-se
                            </button>
                            @break
                        @endif
                    @endif
                @endforeach





            </div>
        </div>
    </div>
</form>


