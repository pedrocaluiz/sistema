@extends('layouts.base', ["current" => "unidades"])

@section('header')
  @lang('messages.unity')
@endsection

@section('title')
  @lang('messages.unity')
@endsection

@push('css')
  <style>
    .curso>.box-title {
      font-size: 40px;
    }
    .curso {
      display: flex;
      justify-content: center;
    }
    .video {
      width: 852px;
      height: 480px;
    }
    #descricao {
      font-size: 30px;
    }
    .flex-justify-center {
      display: flex;
      justify-content: center;
    }
    .flex-justify-center>label {
      margin-right: 10px;
    }
  </style>
@endpush

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
    @if (isset($unidade, $user))




        <div class="box">
          <div class="box-header curso">
            <h1 class="box-title">{{$unidade->titulo}}</h1>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12" style="display: flex; justify-content: flex-end">
                <p>Instrutor do Curso: <strong>{{ $user->primeiroNome }} {{ $user->ultimoNome }}</strong></p>
              </div>
            </div>

          <form class="cadastro" id="formMaterial">

            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" id="unidade_id" name="unidade_id" value="{{$unidade->id}}">

            @isset($materiais)

                @foreach($materiais as $mat)
                  <div class="row" style="display: flex; justify-content: center; margin-top: 40px">
                    <p id="descricao">Descrição: <strong>{{ $mat->descricao }}</strong></p>
                  </div>
                  <input type="text" id="material_id" name="material_id" value="{{$mat->id}}" hidden>


                    @if (($mat->material_id == 2) && ($mat->storage == 0))
                        <div class="row">
                          <div class="video">
                            <iframe id="player" class="video" src="{{$mat->urlArquivo}}?enablejsapi=1" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                          </div>
                        </div>
                    @endif

                    @if (($mat->material_id == 2) && ($mat->storage == 1))
                        <div class="row">
                          <div class="video" >
                            <video class="video" controls onclick="concluir();">
                              <source src="/storage/{{$mat->urlArquivo}}" type="video/mp4">
                            </video>
                          </div>
                        </div>
                    @endif

                    @if (($mat->material_id == 3) && ($mat->storage == 0))
                        <div class="row" style="display: flex; justify-content: center; margin-top: 20px">

                            <a href="{{$mat->urlArquivo}}" onclick="concluir();" target="_blank"><strong>Link</strong></a>

                        </div>
                    @endif

                  <div class="row flex-justify-center">
                    <div class="col-md-3 flex-justify-center">
                      <label for="concluido">Concluído</label>
                      <input type="checkbox" class="icheckbox_flat-blue" name="concluido" id="concluido">
                    </div>
                  </div>

                @endforeach

            @endisset
          </form>
            <div class="row">
              <div class="col-md-12" style="display: flex; justify-content: center;">
                {{ $materiais->links() }}
              </div>
            </div>
          </div>

          <div class="box-footer">
            <div class="col-md-6" style="display: flex; justify-content: center">
              <a href="#atividade" id="atividade">
                Clique aqui para Avaliação de Aprendizagem
              </a>
            </div>
          </div>

        </div>






      @endif
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://www.youtube.com/iframe_api"></script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $("#formMaterial").submit( function(event){
        event.preventDefault();
    });

    function inscrever() {
        dados = {
            material_id: $("#material_id").val()
        };
        console.log(dados);
        $.post("/inscrever/material", dados).done(function( data ) {
            console.log(data);
            dataJson = JSON.parse(data);
            console.log(dataJson);
        });
    }

    function concluir() {
        let current_datetime = new Date();
        let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds();
        dados = {
            unidade_id: $("#unidade_id").val(),
            dataConclusao: formatted_date,
            material_id: $("#material_id").val()
        };
        console.log(dados);
        $.post("/concluir/material", dados).done(function( data ) {
            $("#teste").html( data );
            /*console.log(data);
            dataJson = JSON.parse(data);
            console.log(dataJson);*/
            //data são os dados como array, dataJson é o objeto
            //podendo recuperar por exemplo dataJson.id
        });
    }

    function onPlayerStateChange(event) {
        switch(event.data) {
            case 0:
                //alert('video ended');
                //chamar função que cria data de conclusão
                concluir();
                break;
            case 1:
                //alert('video playing from '+player.getCurrentTime());
                //chamar função que cria a tabela
                inscrever();
                break;
        }
    }

    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player( 'player', {
            events: { 'onStateChange': onPlayerStateChange }
        });
    }

    /*
    //verificando se está na última página;
    lastPage = $("#lastPage").val();
    $("a.page-link").click(function(){
        paginaAtual = $(this).text();
        if (paginaAtual == lastPage){
            ultimaPagina = 1;
            console.log(ultimaPagina);
        }else {
            ultimaPagina = 0;
            console.log(ultimaPagina);
        }
    });*/

    $(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    });

</script>
@endpush

