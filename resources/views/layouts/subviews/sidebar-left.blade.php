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
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{asset('AdminLTE/index.html')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                            <li><a href="{{asset('AdminLTE/index2.html')}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                        </ul>
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
                    <li>
                        <a href="{{asset('AdminLTE/pages/widgets.html')}}">
                            <i class="fa fa-th"></i> <span>Widgets</span>
                            <span class="pull-right-container">
                      <small class="label pull-right bg-green">new</small>
                    </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Charts</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('AdminLTE/pages/charts/chartjs.html')}}"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                            <li><a href="{{asset('AdminLTE/pages/charts/morris.html')}}"><i class="fa fa-circle-o"></i> Morris</a></li>
                            <li><a href="{{asset('AdminLTE/pages/charts/flot.html')}}"><i class="fa fa-circle-o"></i> Flot</a></li>
                            <li><a href="{{asset('AdminLTE/pages/charts/inline.html')}}"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>UI Elements</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('AdminLTE/pages/UI/general.html')}}"><i class="fa fa-circle-o"></i> General</a></li>
                            <li><a href="{{asset('AdminLTE/pages/UI/icons.html')}}"><i class="fa fa-circle-o"></i> Icons</a></li>
                            <li><a href="{{asset('AdminLTE/pages/UI/buttons.html')}}"><i class="fa fa-circle-o"></i> Buttons</a></li>
                            <li><a href="{{asset('AdminLTE/pages/UI/sliders.html')}}"><i class="fa fa-circle-o"></i> Sliders</a></li>
                            <li><a href="{{asset('AdminLTE/pages/UI/timeline.html')}}"><i class="fa fa-circle-o"></i> Timeline</a></li>
                            <li><a href="{{asset('AdminLTE/pages/UI/modals.html')}}"><i class="fa fa-circle-o"></i> Modals</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Forms</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('AdminLTE/pages/forms/general.html')}}"><i class="fa fa-circle-o"></i> General Elements</a></li>
                            <li><a href="{{asset('AdminLTE/pages/forms/advanced.html')}}"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                            <li><a href="{{asset('AdminLTE/pages/forms/editors.html')}}"><i class="fa fa-circle-o"></i> Editors</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Tables</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('AdminLTE/pages/tables/simple.html')}}"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                            <li><a href="{{asset('AdminLTE/pages/tables/data.html')}}"><i class="fa fa-circle-o"></i> Data tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{asset('AdminLTE/pages/calendar.html')}}">
                            <i class="fa fa-calendar"></i> <span>Calendar</span>
                            <span class="pull-right-container">
                      <small class="label pull-right bg-red">3</small>
                      <small class="label pull-right bg-blue">17</small>
                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('AdminLTE/pages/mailbox/mailbox.html')}}">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <span class="pull-right-container">
                      <small class="label pull-right bg-yellow">12</small>
                      <small class="label pull-right bg-green">16</small>
                      <small class="label pull-right bg-red">5</small>
                    </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Examples</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('AdminLTE/pages/examples/invoice.html')}}"><i class="fa fa-circle-o"></i> Invoice</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/profile.html')}}"><i class="fa fa-circle-o"></i> Profile</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/login.html')}}"><i class="fa fa-circle-o"></i> Login</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/register.html')}}"><i class="fa fa-circle-o"></i> Register</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/lockscreen.html')}}"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/404.html')}}"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/500.html')}}"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/blank.html')}}"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                            <li><a href="{{asset('AdminLTE/pages/examples/pace.html')}}"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                            <li><a href="{{route('cargos')}}"><i class="fa fa-circle-o"></i> Cargos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level One
                                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        </ul>
                    </li>
                    <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                    <li class="header">LABELS</li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
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