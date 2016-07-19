@extends('app')

@section('content')


<div class="container">
	<div class="row">
        <nav class="sidebar-nav">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Resumen</a></li>
                        <li><a href="consultarAccionista.jsp">Información Accionistas</a></li>
                        <li><a href="comprarAccion.jsp">Comprar Acción</a></li>
                        <li><a href="insertarTransaccion.jsp">Registrar Transacción</a></li>
                        <li><a href="interesesMensuales.jsp">Intereses Mensuales</a></li>
                        <li><a href="reportes.jsp#">Reportes</a></li>
                        <li><a href="grid.jsp#">Grid</a></li>
                    </ul>
                </div>
            </nav>
        </nav>
    </div>


	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
