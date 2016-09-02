@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Préstamos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="prestamos">
                                <thead>
                                    <tr>
                                        <th> Accionista</th>
                                        <th> Monto préstamo</th>
                                        <th> Pagos realizados</th>
                                        <th> Deuda actual</th>
                                        <th> Fecha</th>
                                    </tr>
                                </thead>

                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->monto}}</td>
                                        <td>{{$r->pagoCapital}}</td>
                                        <td><strong>{{$r->deuda}}</strong></td>
                                        <td>{{$r->fecha}}</td>
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