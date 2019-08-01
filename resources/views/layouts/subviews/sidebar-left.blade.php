<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

    <!-- User Search -->
    @includeIf('layouts.subviews.user-search')
    <!-- User Search -->

    @php $perfis = Auth::user()->perfil; @endphp



        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            @foreach ($perfis as $perfil)

                @if ($perfil->administrador == 1)
                    <li class="header">ADMINISTRADOR</li>

                    <li @if(isset($current) && ($current =="meus-cursos")) class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Meus Cursos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('meus-cursos.andamento')}}"><i class="fa fa-circle-o text-yellow"></i> Em Andamento</a></li>
                            <li><a href="{{route('meus-cursos.concluidos')}}"><i class="fa fa-circle-o text-red"></i> Concluídos</a></li>
                            <li><a href="{{route('meus-cursos')}}"><i class="fa fa-circle-o text-aqua"></i> Todos</a></li>
                        </ul>
                    </li>


                    <li @if(isset($menu) && ($menu == "listar")) class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Listar</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li @if(isset($current) && ($current == "categorias")) class="active"@endif>
                                <a href="{{route('categorias')}}"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li @if(isset($current) && ($current == "cursos")) class="active"@endif>
                                <a href="{{route('cursos.index-adm')}}"><i class="fa fa-circle-o"></i> Cursos</a></li>
                            <li @if(isset($current) && ($current == "unidades")) class="active"@endif>
                                <a href="{{route('unidades')}}"><i class="fa fa-circle-o"></i> Unidades</a></li>
                            <li @if(isset($current) && ($current == "materiais")) class="active"@endif>
                                <a href="{{route('materiais.instrutor')}}"><i class="fa fa-circle-o"></i> Materiais</a></li>
                            <li @if(isset($current) && ($current == "questoes")) class="active"@endif>
                                <a href="{{route('questoes')}}"><i class="fa fa-circle-o"></i> Questões</a></li>
                            </br>
                            <li @if(isset($current) && ($current == "usuarios")) class="active"@endif>
                                <a href="{{route('usuarios')}}"><i class="fa fa-circle-o"></i> Usuários</a></li>
                            <li @if(isset($current) && ($current == "tipodoc")) class="active"@endif>
                                <a href="{{route('tipodoc')}}"><i class="fa fa-circle-o"></i> Tipo de Docs.</a></li>
                            <li @if(isset($current) && ($current == "agencias")) class="active"@endif>
                                <a href="{{route('agencias')}}"><i class="fa fa-circle-o"></i> Agências</a></li>
                            <li @if(isset($current) && ($current == "cargos")) class="active"@endif>
                                <a href="{{route('cargos')}}"><i class="fa fa-circle-o"></i> Cargos</a></li>
                            <li @if(isset($current) && ($current == "funcoes")) class="active"@endif>
                                <a href="{{route('funcoes')}}"><i class="fa fa-circle-o"></i> Funções</a></li>
                        </ul>
                    </li>
                    <li @if(isset($menu) && ($menu == "cadastrar")) class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Cadastrar</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li @if(isset($current) && ($current == "categorias")) class="active"@endif>
                                <a href="{{route('categorias.create')}}"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li @if(isset($current) && ($current == "cursos")) class="active"@endif>
                                <a href="{{route('cursos.create')}}"><i class="fa fa-circle-o"></i> Curso</a></li>
                            <li @if(isset($current) && ($current == "unidades")) class="active"@endif>
                                <a href="{{route('unidades.create')}}"><i class="fa fa-circle-o"></i> Unidade</a></li>
                            <li @if(isset($current) && ($current == "materiais")) class="active"@endif>
                                <a href="{{route('materiais.instrutor.create')}}"><i class="fa fa-circle-o"></i> Material</a></li>
                            <li @if(isset($current) && ($current == "questoes")) class="active"@endif>
                                <a href="{{route('questoes.create')}}"><i class="fa fa-circle-o"></i> Questão</a></li>

                            </br>
                            <li @if(isset($current) && ($current == "tipodoc")) class="active"@endif>
                                <a href="{{route('tipodoc.create')}}"><i class="fa fa-circle-o"></i> Tipo de Docs.</a></li>
                            <li @if(isset($current) && ($current == "agencias")) class="active"@endif>
                                <a href="{{route('agencias.create')}}"><i class="fa fa-circle-o"></i> Agências</a></li>
                            <li @if(isset($current) && ($current == "cargos")) class="active"@endif>
                                <a href="{{route('cargos.create')}}"><i class="fa fa-circle-o"></i> Cargos</a></li>
                            <li @if(isset($current) && ($current == "funcoes")) class="active"@endif>
                                <a href="{{route('funcoes.create')}}"><i class="fa fa-circle-o"></i> Funções</a></li>
                        </ul>
                    </li>


                @endif

                @if ($perfil->descricao == "Instrutor")
                    <li class="header">INSTRUTOR</li>
                    <li @if(isset($menu) && ($menu == "listar")) class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Listar</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li @if(isset($current) && ($current == "cursos")) class="active"@endif>
                                <a href="{{route('cursos')}}"><i class="fa fa-circle-o"></i> Cursos</a></li>
                            <li @if(isset($current) && ($current == "unidades")) class="active"@endif>
                                <a href="{{route('unidades')}}"><i class="fa fa-circle-o"></i> Unidades</a></li>
                            <li @if(isset($current) && ($current == "materiais")) class="active"@endif>
                                <a href="{{route('materiais.instrutor')}}"><i class="fa fa-circle-o"></i> Materiais</a></li>
                            <li @if(isset($current) && ($current == "questoes")) class="active"@endif>
                                <a href="{{route('questoes')}}"><i class="fa fa-circle-o"></i> Questões</a></li>
                            <li @if(isset($current) && ($current == "avaliacoes")) class="active"@endif>
                                <a href="#"><i class="fa fa-circle-o"></i> Avaliações</a></li>

                        </ul>
                    </li>
                    <li @if(isset($menu) && ($menu == "cadastrar")) class="treeview active" @else class="treeview" @endif>
                      <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Cadastrar</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                      </a>
                      <ul class="treeview-menu">
                        <li @if(isset($current) && ($current == "cursos")) class="active"@endif>
                          <a href="{{route('cursos.create')}}"><i class="fa fa-circle-o"></i> Curso</a></li>
                        <li @if(isset($current) && ($current == "unidades")) class="active"@endif>
                          <a href="{{route('unidades.create')}}"><i class="fa fa-circle-o"></i> Unidade</a></li>
                        <li @if(isset($current) && ($current == "materiais")) class="active"@endif>
                          <a href="{{route('materiais.instrutor.create')}}"><i class="fa fa-circle-o"></i> Material</a></li>
                        <li @if(isset($current) && ($current == "questoes")) class="active"@endif>
                          <a href="{{route('questoes.create')}}"><i class="fa fa-circle-o"></i> Questão</a></li>
                      </ul>
                    </li>

                @endif

                @if ($perfil->descricao == "Aluno")
                    <li class="header">ALUNO</li>
                    <li @if(isset($current) && ($current =="meu-perfil")) class="active" @endif>
                        <a href="#{{asset('AdminLTE/pages/calendar.html')}}">
                            <i class="fa fa-user"></i> <span>Meu Perfil</span>
                            <span class="pull-right-container">
                            </span>
                            </a>
                        </li>
                    <li @if(isset($current) && ($current =="meus-cursos")) class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Meus Cursos</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('meus-cursos.andamento')}}"><i class="fa fa-circle-o text-yellow"></i> Em Andamento</a></li>
                            <li><a href="{{route('meus-cursos.concluidos')}}"><i class="fa fa-circle-o text-red"></i> Concluídos</a></li>
                            <li><a href="{{route('meus-cursos')}}"><i class="fa fa-circle-o text-aqua"></i> Todos</a></li>
                        </ul>
                    </li>
                @endif

            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
