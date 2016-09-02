@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Pagos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="pagos">
                                <thead>
                                <tr>
                                    <th> Accionista</th>
                                    <th> Fecha</th>
                                    <th> Préstamo</th>
                                    <th> Pagos Capital</th>
                                    <th> Pagos Interés</th>
                                </tr>
                                </thead>
                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->fecha}}</td>
                                        <td>{{$r->prestamo}}</td>
                                        <td>{{$r->pagoCapital}}</td>
                                        <td>{{$r->pagoInteres}}</td>
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