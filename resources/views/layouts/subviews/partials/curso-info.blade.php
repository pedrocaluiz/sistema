<form class="cadastro" id="formCurso">
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
                @if (isset($user_curso[0]))
                    <p><strong>Você já está inscrito</strong></p>
                @else
                    <button type="button" class="btn btn-primary botao" id="btnInscrever" onclick="inscrever()">
                        <i class="fa fa-plus"></i> &nbsp;&nbsp;Inscrever-se
                    </button>
                @endif
            </div>
        </div>
    </div>
</form>


