<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Document</title>
  <style>
    .signature, .title {
      float:left;
      border-top: 1px solid #000;
      width: 200px;
      text-align: center;
    }
    #image{
      width: 900px;
      margin: 0 auto;
    }

  </style>
</head>
<body>
<div id="image">
  <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
      <span style="font-size:60px; font-weight:bold">Certificado de Conclusão</span>
      <br><br>
      <span style="font-size:15px"><i>Certificamos que</i></span>
      <br><br>
      <span style="font-size:45px"><b>{{$auth->primeiroNome}} {{$auth->ultimoNome}}</b></span><br/><br/>
      <span style="font-size:15px"><i>Concluiu o curso online</i></span> <br/><br/>
      <span style="font-size:30px">{{$curso->titulo}}</span> <br/><br/><br/><br/>
      @if ($curso->usuario->where('id', $auth->id)->first()->pivot->notaAval > 0)
        <span style="font-size:15px">Nota de Aprovação <b>{{$curso->usuario->where('id', $auth->id)->first()->pivot->notaAval}}</b></span> <br/><br/>
      @else
        <span style="font-size:15px">Curso sem avaliação </span> <br/><br/>
      @endif
      <span style="font-size:15px"><i>Com início em </i></span><strong>{{date('d-m-Y', strtotime($curso->usuario->where('id', $auth->id)->first()->pivot->created_at))}}</strong>
      <span style="font-size:15px"><i>e conluído em </i></span><strong>{{date('d-m-Y', strtotime($curso->usuario->where('id', $auth->id)->first()->pivot->dataConclusao))}}</strong><br/><br/><br/><br/>
      <table style="margin-top:40px;float:left">
        <tr>
          <td ><span><i>{{$instrutor->primeiroNome}} {{$instrutor->ultimoNome}}</i></span></td>
          <!--style="font-family: 'Edwardian Script ITC', sans-serif, Verdana; font-size: 35px"-->
        </tr>
        <tr>
          <td style="width:200px;float:left;border:0;border-bottom:1px solid #000;"></td>
        </tr>
        <tr>
          <td style="text-align:center"><span><b>Instrutor do Curso</b></span></td>
        </tr>
      </table>
      <table style="margin-top:40px;float:right; text-align: center">
        <tr>
          <td ><span><i>Pedro Luiz Colognese</i></span></td>
          <!--<td ><span><b>Pedro Luiz Colognese</b></span></td>style="font-family: 'Palace Script MT', sans-serif, Verdana; font-size: 40px"-->
        </tr>
        <tr>
          <td style="width:200px;float:right;border:0;border-bottom:1px solid #000;"></td>
        </tr>
        <tr>
          <td style="text-align:center"><span><b>Diretor da Plataforma</b></span></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>







