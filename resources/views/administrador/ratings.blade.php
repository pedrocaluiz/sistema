@extends('layouts.base', ["current" => "cursos"])

@section('header')
  Avaliação do Curso
@endsection

@section('title')
  Avaliação
@endsection

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              Avaliações do Curso: <a href="/cursos/{{$curso->id}}">{{$curso->titulo}}</a>
            </h3>
          </div>
          <div class="box-body">
            <fieldset>
              <legend>Ditática e Conteúdo:</legend>

                    @forelse($ratings as $r)
                        <div class="row">
                            <div class="col-md-8">
                            @foreach($users as $user)
                                @if ($user->id == $r->user_id)
                                    <h4>Usuário: {{$user->primeiroNome}} {{$user->ultimoNome}}</h4>
                                @endif
                            @endforeach
                            </div>
                        </div>
                        <div class="row">

                        <div class="form-group col-md-2">

                            <label for="rating">Rating</label>

                                @switch($r->rating)
                                    @case(0)
                                    <div style="margin-top: 10px">
                                        <img src="/img/star0.png" id="s1">
                                        <img src="/img/star0.png" id="s2">
                                        <img src="/img/star0.png" id="s3">
                                        <img src="/img/star0.png" id="s4">
                                        <img src="/img/star0.png" id="s5">
                                    </div>
                                    @break

                                    @case(1)
                                    <div style="margin-top: 10px">
                                        <img src="/img/star1.png" id="s1">
                                        <img src="/img/star0.png" id="s2">
                                        <img src="/img/star0.png" id="s3">
                                        <img src="/img/star0.png" id="s4">
                                        <img src="/img/star0.png" id="s5">
                                    </div>
                                    @break

                                    @case(2)
                                    <div style="margin-top: 10px">
                                        <img src="/img/star1.png" id="s1">
                                        <img src="/img/star1.png" id="s2">
                                        <img src="/img/star0.png" id="s3">
                                        <img src="/img/star0.png" id="s4">
                                        <img src="/img/star0.png" id="s5">
                                    </div>
                                    @break

                                    @case(3)
                                    <div style="margin-top: 10px">
                                        <img src="/img/star1.png" id="s1">
                                        <img src="/img/star1.png" id="s2">
                                        <img src="/img/star1.png" id="s3">
                                        <img src="/img/star0.png" id="s4">
                                        <img src="/img/star0.png" id="s5">
                                    </div>
                                    @break

                                    @case(4)
                                    <div style="margin-top: 10px">
                                        <img src="/img/star1.png" id="s1">
                                        <img src="/img/star1.png" id="s2">
                                        <img src="/img/star1.png" id="s3">
                                        <img src="/img/star1.png" id="s4">
                                        <img src="/img/star0.png" id="s5">
                                    </div>
                                    @break

                                    @case(5)
                                    <div style="margin-top: 10px">
                                        <img src="/img/star1.png" id="s1">
                                        <img src="/img/star1.png" id="s2">
                                        <img src="/img/star1.png" id="s3">
                                        <img src="/img/star1.png" id="s4">
                                        <img src="/img/star1.png" id="s5">
                                    </div>
                                    @break
                                @endswitch
                        </div>
                        <div class="form-group col-md-6">

                            <label for="comentario">Comentário</label>
                            <textarea disabled id="comentario" rows="2" cols="50" name="comentario" class="form-control" maxlength="500" style="resize: vertical">{{$r->comentario}}</textarea>
                        </div>
                        <input type="hidden" name="curso" value="{{$curso->id}}">
                    </div>
                    @empty
                        <h2>Não há avaliações para esse curso.</h2>
                    @endforelse
            </fieldset>
          </div>
          @php $perfis = Auth::user()->perfil; //dd($perfis[1]->administrador) @endphp
          @foreach ($perfis as $perfil)
              @if ($perfil->administrador != 1 and Auth::user()->id != $curso->usuarioAtualizacao)
                  <div class="box-footer d-flex justify-content-center">
                      <div class="col-md-2">
                          <a href="/cursos/{{$curso->id}}/rating" type="button" class="btn btn-primary botao" id="cadastro">
                              Comentar
                          </a>
                      </div>
                  </div>
                  @break
              @endif
          @endforeach
      </div>
    </div>
  </div>
@endsection

@push('scripts')

  <script type="text/javascript">
      function Avaliar(estrela) {

          console.log(estrela);

          var url = window.location;
          url = url.toString()
          url = url.split("index.html");
          url = url[0];

          console.log(url);
          console.log(url + "/img/star0.png");


          var s1 = document.getElementById("s1").src.split("star");
          var s2 = document.getElementById("s2").src.split("star");
          var s3 = document.getElementById("s3").src.split("star");
          var s4 = document.getElementById("s4").src.split("star");
          var s5 = document.getElementById("s5").src.split("star");

          var avaliacao = 0;

          if (estrela == 5){
              if (s5[1] == "0.png") {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star1.png";
                  document.getElementById("s4").src = "/img/star1.png";
                  document.getElementById("s5").src = "/img/star1.png";
                  avaliacao = 5;
              } else {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star1.png";
                  document.getElementById("s4").src = "/img/star1.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 4;
              }}

          //ESTRELA 4
          if (estrela == 4){
              if (s4[1] == "0.png") {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star1.png";
                  document.getElementById("s4").src = "/img/star1.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 4;
              } else {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star1.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 3;
              }}

          //ESTRELA 3
          if (estrela == 3){
              if (s3[1] == "0.png") {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star1.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 3;
              } else {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star0.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 2;
              }}

          //ESTRELA 2
          if (estrela == 2){
              if (s2[1] == "0.png") {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star1.png";
                  document.getElementById("s3").src = "/img/star0.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 2;
              } else {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star0.png";
                  document.getElementById("s3").src = "/img/star0.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 1;
              }}

          //ESTRELA 1
          if (estrela == 1){
              if (s1[1] == "0.png") {
                  document.getElementById("s1").src = "/img/star1.png";
                  document.getElementById("s2").src = "/img/star0.png";
                  document.getElementById("s3").src = "/img/star0.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 1;
              } else {
                  document.getElementById("s1").src = "/img/star0.png";
                  document.getElementById("s2").src = "/img/star0.png";
                  document.getElementById("s3").src = "/img/star0.png";
                  document.getElementById("s4").src = "/img/star0.png";
                  document.getElementById("s5").src = "/img/star0.png";
                  avaliacao = 0;
              }}

          $("#rating").val(avaliacao);

      }

  </script>
@endpush
