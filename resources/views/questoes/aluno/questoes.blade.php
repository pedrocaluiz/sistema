@extends('layouts.base', ["current" => "avaliacao"])

@section('header')
    Avaliação
@endsection

@section('title')
    Avaliação
@endsection

@push('css')
  <style>
    .questao {
      border: 1px solid lightblue;
      padding: 10px;
      margin: 10px;
      border-radius: 10px;
    }
     .box-header{
       padding-left: 20px;
     }
  </style>
  @endpush

@section('content')


  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <form method="POST" action="{{route('provas.concluir')}}" class="cadastro">
          @csrf
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
                    <h4>{{$questao->id}}</h4>



              </div>
              <div class="col-md-9">
                <div class="row">
                  <h4>{{$questao->questao}}</h4>
                  <p>Escolha uma alternativa</p>
                </div>
                @php
                  $resp_q = $questao->respostas->whereIn('id', [$qr->resposta_id_1, $qr->resposta_id_2, $qr->resposta_id_3, $qr->resposta_id_4, $qr->resposta_id_5]);
                @endphp
                @foreach ($resp_q as $resp)
                    @if ($resp->id == $qr->resposta_id_1)
                    <div class="row">
                      <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$resp->id}}" onclick="respondida(this)" required>
                      <label for="{{$resp->id}}">{{$resp->id}} -- {{$resp->resposta}}</label>
                    </div>
                    @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_2)
                    <div class="row">
                      <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$resp->id}}" onclick="respondida(this)" required>
                      <label for="{{$resp->id}}">{{$resp->id}} -- {{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_3)
                    <div class="row">
                      <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$resp->id}}" onclick="respondida(this)" required>
                      <label for="{{$resp->id}}">{{$resp->id}} -- {{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_4)
                    <div class="row">
                      <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$resp->id}}" onclick="respondida(this)" required>
                      <label for="{{$resp->id}}">{{$resp->id}} -- {{$resp->resposta}}</label>
                    </div>
                  @endif
                @endforeach

                @foreach ($resp_q as $resp)
                  @if ($resp->id == $qr->resposta_id_5)
                    <div class="row">
                      <input type="radio" class="icheckbox_flat-blue" value="{{$resp->id}}" name="{{$questao->id}}" id="{{$resp->id}}" onclick="respondida(this)" required>
                      <label for="{{$resp->id}}">{{$resp->id}} -- {{$resp->resposta}}</label>
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
            <button type="submit"  class="btn btn-primary botao" id="cadastro">
              <i class="fa fa-check-square"></i> &nbsp;&nbsp;Finalizar Tentativa
            </button>
          </div>
        </div>
        </form>
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
      }

      $(function(){
      });*/

  </script>
@endpush



