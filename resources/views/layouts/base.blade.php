<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>
        @yield('header', 'Sistema')
    </title>

    @includeIf('layouts.subviews.head')
    @stack('css')
    @includeIf('layouts.subviews.scripts')
    @stack('scripts')

</head>
<body class="hold-transition sidebar-mini skin-blue">
<div class="wrapper">

    <!-- Header Nav-->
    @includeIf('layouts.subviews.header-nav')
    <!-- Header Nav-->

    <!-- Sidebar Left -->
    @includeIf('layouts.subviews.sidebar-left')
    <!-- Sidebar Left -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title', 'Sistema')
                <small>{{__('messages.control')}}</small>
            </h1>
            <ol class="breadcrumb">
                @guest
                    <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard"></i> Welcome</a></li>
                @endguest
                @auth
                    <li><a href="{{route('todos-cursos')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                @endauth
                <li class="active">Dashboard</li>
            </ol>
        </section>
    @hasSection('content')
    <!-- Main content -->
        <section class="content">
            @yield('content', 'Default Content')
        </section>
    @endif
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @includeIf('layouts.subviews.footer')
    <!-- Footer -->

    <!-- Control Sidebar -->
    @includeIf('layouts.subviews.control-sidebar')
    <!-- Control Sidebar -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!-- ./wrapper -->


</body>
</html>
