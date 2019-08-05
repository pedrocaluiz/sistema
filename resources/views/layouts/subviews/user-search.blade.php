<!-- Sidebar Usuário -->
<div class="user-panel">
    @auth
    <div class="pull-left image">
        @if (Auth::user()->foto != null)
            <img src="/storage/{{Auth::user()->foto}}" class="img-circle" alt="User Image">
        @else
            <img src="{{asset('css/avatar-3.jpg')}}" class="img-circle" alt="User Image">
        @endif
    </div>
    <div class="pull-left info">
        <p>
            {{ Auth::user()->primeiroNome }}
            {{  Auth::user()->ultimoNome }}
        </p>
    </div>
    @endauth
    @guest
        <div class="pull-left image">
            <img src="{{asset('css/avatar-3.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p> Identifique-se</p>
            <a href="{{route('login')}}"><i class=""></i> Login</a>
        </div>
    @endguest
</div>
<!-- Sidebar Usuário -->

<!-- Search form no sidebar esquerdo-->
<form action="{{route('cursos.buscar')}}" method="POST" class="sidebar-form">
    @csrf
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Procurar Curso...">
        <span class="input-group-btn">
            <button type="submit" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>
<!-- /.search form -->


