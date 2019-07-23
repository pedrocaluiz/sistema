@extends('layouts.base', ["current" => "questoes"])

@section('header')
  @lang('messages.course')
@endsection

@section('title')
  @lang('messages.course')
@endsection

@push('css')
  <style>
    .box-header{
      padding-left: 20px;
    }
    .centralizar{
      display: flex;
      justify-content: center;
    }
    .centralizar>p{
      font-size: 20px;
    }
  </style>
@endpush

@section('content')
  <div class="row align-items-end">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <div class="box-title">
            <h1>{{$curso[0]->titulo}}</h1>
            <h2>{{$unidade->titulo}}</h2>
            <small>Método de avaliação: Nota mais alta. (Máx 10.00)</small>
          </div>
        </div>

          <div class="box-body">
            @if (isset($provas[0]))
            <fieldset>
              <legend>Resumo das tentativas anteriores:</legend>
              <table class="table table-bordered table-striped">
              <thead>
              <tr role="row">
                <th>Tentativa</th>
                <th>Status</th>
                <th>Nota</th>
                <th>Revisão</th>
              </tr>
              <tbody>
              @foreach($provas->sortBy('tentativa') as $prova)
                <tr>
                    <td>{{$prova->tentativa}}</td>
                  @if (empty($prova->dataConclusao))
                      <td>Em andamento</td>
                  @else
                      <td>Finalizada em  {{date('d-m-Y', strtotime($prova->dataConclusao)) }} às {{date('H:i:s', strtotime($prova->dataConclusao)) }}</td>
                  @endif
                  @if (empty($prova->notaAval))
                    <td>--</td>
                  @else
                    <td>{{$prova->notaAval}}</td>
                  @endif
                  @if (empty($prova->dataConclusao))
                    <td>--</td>
                  @else
                    <td><a href="/provas/{{$prova->id}}/revisao">Revisão</a></td>
                  @endif


                    {{--  TODO CRIAR UMA MENSAGEM SE NÃO HOUVER NENHUAM TENTATIVA  --}}

                </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>Tentativa</th>
                <th>Status</th>
                <th>Nota</th>
                <th>Revisão</th>
              </tr>
              </tfoot>
              </thead>
            </table>
              <div class="row centralizar">
                  <p>Nota mais alta: <strong>{{$provas->max('notaAval')}}</strong></p>
              </div>
            </fieldset>

          </div>
        @else
          <div class="row centralizar" >
              <h2>Não há tentativas anteriores</h2>
          </div>
        @endif
        <div class="box-footer">
          <div class="col-md-2">

            @if (!isset($nao_concluidos[0]))
                @if (isset($prova_iniciada[0]))
                <a type="button" href="/provas/{{$unidade->id}}"  class="btn btn-primary botao" id="cadastro">
                  <i class="fa fa-check-square"></i> &nbsp;&nbsp;Finalizar Tentativa
                </a>
                @else
                <a type="button" href="/provas/{{$unidade->id}}"  class="btn btn-primary botao" id="cadastro">
                  <i class="fa fa-check-square"></i> &nbsp;&nbsp;Nova Tentativa
                </a>
                @endif
            @else
                <a type="button" href="/unidades/{{$unidade->id}}"  class="btn btn-primary botao" id="cadastro">
                  <i class="fa fa-check-square"></i> &nbsp;&nbsp;Voltar para a Unidade
                </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

@push('scripts')
  <script type="text/javascript">

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });
  </script>
@endpush