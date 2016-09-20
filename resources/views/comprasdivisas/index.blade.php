@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Compras divisas</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> Compra</th>
                                    <th> Moneda</th>
                                    <th> Monto</th>
                                    <th> Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->cantidad}}</td>
                                        <td>{{$r->moneda}}</td>
                                        <td>{{$r->monto}}</td>
                                        <td>{{$r->fecha}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection