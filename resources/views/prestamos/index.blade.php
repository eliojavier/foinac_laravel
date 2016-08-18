@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Préstamos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="prestamos">
                                <thead>
                                <tr>
                                    <th> Accionista</th>
                                    <th> Fecha</th>
                                    <th> Monto préstamo</th>
                                    <th> Pagos realizados</th>
                                    <th> Deuda actual</th>
                                    <th> Intereses Pagados</th>
                                </tr>
                                </thead>

                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->fecha}}</td>
                                        <td>{{$r->prestamo}}</td>
                                        <td>{{$r->pagos}}</td>
                                        <td><strong>{{$r->deuda}}</strong></td>
                                        <td>{{$r->interesespagados}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection