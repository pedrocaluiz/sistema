<!DOCTYPE html>
<html lang="pt-BR">
<head>

  <title>{{Auth::user()->primeiroNome}} {{Auth::user()->ultimoNome}}</title>

  <!--<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>-->

  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <style>
    .container{
      display: flex;
      justify-content: center;
      flex-direction: column;
      background-image: url("https://onlinecursosgratuitos.com/wp-content/uploads/2019/07/modelo-de-certificado-em-branco-6.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      width: 1155px;
      height: 892px;
      margin: 0 auto;
    }

    .centered {
      margin-top: -65px;
      text-align: center;
    }

    h1
    {
      margin-top: 15px;
      margin-bottom: 35px;
    }

    h2
    {
      margin-top: 20px;
      margin-bottom: 0;
    }

    #teste {
      position: absolute;
      display: flex;
      justify-content: space-around;
      width: 1155px;
      top: 600px;
      left: 120px;
    }

    #diretor{
      text-align: center;
    }
    #instrutor{
      text-align: center;
    }

    .assinatura {
      font-family: 'Great Vibes', Helvetica, sans-serif;
      color: black;
      font-size: 25px;
      text-shadow: 4px 4px 3px rgba(0,0,0,0.1);
      margin-bottom: 0;
    }
    .cargo {
      margin-top: 10px;
    }
  </style>
</head>
<div class="container">
  <div class="centered">
    <span><i>Certificamos que</i></span>
    <h1>{{Auth::user()->primeiroNome}} {{Auth::user()->ultimoNome}}</h1>
    <span>Concluiu o Curso online</span>
    <h2>Nome do Curso</h2>
    </br></br>
    <span><i>Completou o curso com a nota  </i>: <strong>10</strong></span></br></br></br>
    <span><i>Com inicio em  </i>: <strong>30/05/2019</strong> <i> e concluído em  </i>: <strong>11/07/2019</strong></span>
  </div>
  <div id="teste">
    <div id="instrutor">
      <p class="assinatura">Nome do Instrutor</p>
      <p class="cargo">Instrutor do Curso</p>
    </div>
    <div id="diretor">
      <p class="assinatura">Pedro Luiz Colognese</p>
      <p class="cargo">Diretor da Plataforma</p>
    </div>
  </div>
</div>
</html>

