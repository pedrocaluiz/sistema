@extends('layouts.base', ["current" => "avaliacao"])

@section('header')
  Avaliação
@endsection

@section('title')
 Avaliação
@endsection

@push('css')
  <style>
     .box-header{
       padding-left: 20px;
     }
    .correcao{
      padding: 10px;
      border-radius: 10px;
    }
    .questao {
        /*border: 1px solid lightblue;*/
        padding: 10px;
        margin: 10px;
        border-radius: 10px;
        display: flex;
        align-items: stretch;
    }
    .box-header{
        padding-left: 20px;
    }
    .col-md-3{
        border: 1px solid black;
        margin-right: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .col-md-9{
        border: 1px solid black;
        padding-bottom: 10px;
        padding-left: 30px;
    }
    .alternativa{
        font-weight: 500;
        margin-left: 40px;
        margin-bottom: 20px;
        max-width: 90%;
    }
    .row p{
        margin: 20px;
    }
      .row-questao{
          display: flex;
          justify-content: space-between;
          margin-left: -15px;
      }
      .alert{
          padding: 0;
          margin-bottom: 0;
          margin-left: 10px;
          width: 86px;
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 20px;
          max-height: 100px;
      }
     .alert .icon {
         font-size: 40px;
         margin: 0;
     }
      .h3-questao {
          max-width: 80%;
      }
     .d-flex {
         display: flex;
     }
     @media(max-width: 640px) {
        .alternativa{
            max-width: 80%;
            margin-left: 10px;
        }
         .questao {
             display: flex;
             flex-direction: column;
         }
         .col-md-3 {
             margin-right: 0;
         }
     }

  </style>
  @endpush

@section('content')


  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">


        <div class="box-header">
          <div class="box-title">
            <h2><a href="/provas/{{$unidade->id}}/lista">{{$unidade->titulo}}</a></h2>
            <small> {{$prova->tentativa}}ª tentativa</small>
          </div>
          <input type="hidden" name="prova_id" value="{{$prova->id}}">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @isset($quest_resp)
            @foreach($quest_resp as $qr)
            <div class="row questao">
              <div class="col-md-3">
                  @foreach ($questoes as $questao)
                    @if ($questao->id == $qr->questao_id)
                          <h2>Questão</h2>
                          <h4>ID: {{$questao->id}}</h4>
              </div>
              <div class="col-md-9">
                <div class=" row-questao">
                    <div class="h3-questao">
                        <h3>{{$questao->questao}}</h3>
                        <p>Escolha uma alternativa</p>
                    </div>
                    @php
                        $resp_q = $questao->respostas->whereIn('id', [$qr->resposta_id_1, $qr->resposta_id_2, $qr->resposta_id_3, $qr->resposta_id_4, $qr->resposta_id_5]);
                        $respCorreta = $questao->respCorreta_id;
                    @endphp
                    @if ($qr->alternativaMarcada == $respCorreta)
                        <div class="alert alert-success">
                            <i class="icon fa fa-check"></i>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <i class="icon fa fa-times"></i>
                        </div>
                    @endif


                </div>

                @foreach ($resp_q as $resp)
                    @if ($resp->id == $qr->resposta_id_1)
                    <div class="row d-flex">
                      @php @endphp
                      @if ( $qr->alternativaMarcada == $resp->id )
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled checked>
                      @else
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled>
                      @endif
                      <label class="alternativa" for="{{$questao->id}}">a. &nbsp;&nbsp;&nbsp;&nbsp;{{$resp->resposta}}</label>
                    </div>
                    @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_2)
                    <div class="row d-flex">
                      @if ( $qr->alternativaMarcada == $resp->id )
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled checked>
                      @else
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled>
                      @endif
                      <label class="alternativa" for="{{$questao->id}}">b. &nbsp;&nbsp;&nbsp;&nbsp;{{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_3)
                    <div class="row d-flex">
                      @if ( $qr->alternativaMarcada == $resp->id )
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled checked>
                      @else
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled>
                      @endif
                      <label class="alternativa" for="{{$questao->id}}">c. &nbsp;&nbsp;&nbsp;&nbsp;{{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_4)
                    <div class="row d-flex">
                      @if ( $qr->alternativaMarcada == $resp->id )
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled checked>
                      @else
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled>
                      @endif
                      <label class="alternativa" for="{{$questao->id}}">d. &nbsp;&nbsp;&nbsp;&nbsp;{{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_5)
                    <div class="row d-flex">
                      @if ( $qr->alternativaMarcada == $resp->id )
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled checked>
                      @else
                        <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$questao->id}}" onclick="respondida(this)" disabled>
                      @endif
                      <label class="alternativa" for="{{$questao->id}}">e. &nbsp;&nbsp;&nbsp;&nbsp;{{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach
                @endif
                @endforeach
              </div>
            </div>


            @endforeach
          @endisset
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-md-2">
            <a type="button" href="/provas/{{$unidade->id}}/lista" class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-check-square"></i> &nbsp;&nbsp;Voltar para a Lista
            </a>
          </div>
        </div>

        <!-- /.box-footer -->
      </div>
    </div>
  </div>


@endsection

@push('scripts')
  <script type="text/javascript">

      /*function respondida(input) {
          console.log(input);
          var seletor = '#resp-' + input.id;
          console.log(seletor);
          $(seletor).attr("checked", "checked");
      }*/

      $(function(){
          $('input').iCheck({
              checkboxClass: 'icheckbox_flat-blue',
              radioClass: 'iradio_flat-blue'
          });
      });

  </script>
@endpush



