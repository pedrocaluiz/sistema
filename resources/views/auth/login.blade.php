@includeIf('layouts.subviews.head')
<head>
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('css/adminLTE/fontawesome.all.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
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
        .mb-4{
            margin-bottom: 1.5rem!important;
        }
        #senha{
            font-size: 13px;
        }
    </STYLE>



    <script src="{{asset('js/main.js')}}"></script>
</head>


<body>
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="mb-4">@lang('messages.access')</h5>
                    <img src="{{asset('css/avatar-3.jpg')}}" class="img-radius mb-4" alt="User-Profile-Image">
                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus minlength="8" maxlength="80">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="Senha" required autocomplete="current-password" minlength="8" maxlength="60">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--<div class="form-group row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Manter conectado') }}
                                </label>
                        </div>
                    </div>--}}
                    <button type="submit" class="btn btn-primary shadow-2 mb-4">{{ __('messages.login') }}</button>
                    <p class="mb-0 text-muted">Não possui conta? <a href="{{ route('register') }}">Registre-se</a></p>
                    @if (Route::has('password.request'))
                        <a id="senha" href="{{ route('password.request') }}">Esqueceu sua senha? </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Required Js -->

<script src="{{asset('js/vendor-all.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/pcoded.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/icheck.js')}}"></script>
<link href="{{asset('css/flat/blue.css')}}" rel="stylesheet">

<script>
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    });
</script>

</body>



