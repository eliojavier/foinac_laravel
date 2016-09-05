<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- JQuery-UI CSS -->
    <link href="{{ asset('/css/JQuery-UI.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('/css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('/js/jquery-1.12.4.js')}}" ></script>
    <script src="{{asset('/js/jquery-ui.js')}}" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"> </script>

    <!-- DatePicker -->
    <script src="{{asset('/js/datepicker.js')}}" ></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('/js/plugins/morris/raphael.min.js') }}"> </script>
    <script src="{{ asset('/js/plugins/morris/morris.min.js') }}"> </script>
    <script src="{{ asset('/js/plugins/morris/morris-data.js') }}"> </script>

    <!-- DataTables -->
    <script src="{{asset('/js/dataTables.min.js')}}" ></script>

    <!-- Scripts -->
    <script src="{{ asset('/js/vue.js') }}"> </script>
    <script src="{{ asset('/js/datatable.js') }}"> </script>

    <script src="{{ asset('/js/detallepagos.js') }}"> </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Foinac Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            @if (Auth::guest())
                <li class="dropdown">
                    <li><a href="{{ url('/auth/login') }}">Iniciar sesión</a></li>
                    <li><a href="{{ url('/auth/register') }}">Registrarse</a></li>
                </li>
            @elseif(Auth::user())
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-lock" aria-hidden="true"></i>  {{ Auth::user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesión</a></li>
                </ul>
            </li>
            @endif
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="{{ url('/') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#acciones"><i class="fa fa-line-chart"></i> Acciones <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="acciones" class="collapse">
                        <li>
                            <a href="{{URL::to('acciones/create')}}"><i class="fa fa-fw fa-edit"></i>Registro de acciones</a>
                        </li>
                        <li>
                            <a href="{{URL::to('acciones')}}"><i class="fa fa-fw fa-table"></i>Resumen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#prestamos"><i class="fa fa-university"></i> Préstamos <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="prestamos" class="collapse">
                        <li>
                            <a href="{{URL::to('prestamos/create')}}"><i class="fa fa-fw fa-edit"></i>Registro de préstamos</a>
                        </li>
                        <li>
                            <a href="{{URL::to('prestamos')}}"><i class="fa fa-fw fa-table"></i>Resumen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a data-toggle="collapse" data-target="#pagos"><i class="fa fa-credit-card"></i> Pagos <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="pagos" class="collapse">
                        <li>
                            <a href="{{URL::to('pagos/create')}}"><i class="fa fa-fw fa-edit"></i>Registro de pagos</a>
                        </li>
                        <li>
                            <a href="{{URL::to('pagos')}}"><i class="fa fa-fw fa-table"></i>Resumen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#otras"><i class="fa fa-money"></i> Otras transacciones <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="otras" class="collapse">
                        <li>
                            <a href="{{URL::to('interesesbanco/create')}}"><i class="fa fa-fw fa-edit"></i>Registro interés banco</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i>Registro venta de divisas</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i>Registro compra de divisas</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-table"></i>Resumen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#reportes"><i class="fa fa-bar-chart"></i> Gráficos y reportes <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="reportes" class="collapse">
                        <li>
                            <a href="#">Gráfico...</a>
                        </li>
                        <li>
                            <a href="#">Gráfico...</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard <small>Statistics Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            @yield('content')

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@yield('scripts')

</body>

</html>

<!-- Scripts -->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>-->



