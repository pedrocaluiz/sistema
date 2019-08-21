@includeIf('layouts.subviews.head')
<head>
    <title>Verificar E-mail</title>

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <STYLE>
        .card {
            background-color: white;
            position: relative;
            z-index:2;
        }
        .card .card-body {
            padding: 30px 25px;
        }
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .container{
            display: flex;
            justify-content: center;
        }
        .justify-content-center{
            display: flex;
            justify-content: center;
        }


    </STYLE>


</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verificar seu endereço de E-mail</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Um novo link de verificação foi enviado para o seu E-mail.
                            </div>
                        @endif

                        Antes de prosseguir, verifique seu E-mail em busca de um link de verificação.
                        Se você não recebeu o E-mail, <a href="{{ route('verification.resend') }}">Click aqui para enviar novamente</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
