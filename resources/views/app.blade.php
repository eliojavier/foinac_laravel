<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/mycss.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/js/datepicker.js') }}"> </script>
    <script src="{{ asset('/js/vue.js') }}"> </script>

    <script>
        $(document).ready(function() {
            $('#prestamos').DataTable( {
                "language": {
                    "lengthMenu": " ",
                    "zeroRecords": "No encontrado",
                    "info": "Mostrando páginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Ningún registro disponible",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Próxima",
                        "previous":   "Anterior"
                    }
                },
                "bFilter" : true,
                "bInfo" : true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#acciones').DataTable( {
                "language": {
                    "lengthMenu": " ",
                    "zeroRecords": "No encontrado",
                    "info": "Mostrando páginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Ningún registro disponible",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Próxima",
                        "previous":   "Anterior"
                    }
                },
                "bFilter" : true,
                "bInfo" : true
            });
        });
    </script>



	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container-fluid">
    <div class="row">
	    <nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">FOINAC</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
        </nav>
	</div>
</div>

    <nav class="navbar navbar-default sidebar" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acciones<span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                            <li><a href="{{URL::to('acciones/create')}}">Registrar</a></li>
                            <li><a href="{{URL::to('administracion/acciones')}}">Resumen</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Préstamos<span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                            <li><a href="{{URL::to('prestamos/create')}}">Registrar</a></li>
                            <li><a href="{{URL::to('administracion/prestamos')}}">Resumen</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos<span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                            <li><a href="{{URL::to('pagos/create')}}">Registrar</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

	@yield('content')

</body>
</html>
