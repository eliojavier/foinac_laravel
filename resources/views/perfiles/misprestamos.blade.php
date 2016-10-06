@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-default">
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
                                    <th> Acciones </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $r)
                                    <tr data-id="{{$r->id}}">
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->fecha}}</td>
                                        <td>{{$r->prestamo}}</td>
                                        <td>{{$r->pagos}}</td>
                                        <td><strong>
                                                @if($r->pagos == null)
                                                    {{$r->prestamo}}
                                                @else
                                                    {{$r->deuda}}
                                                @endif
                                            </strong></td>
                                        <td>{{$r->interesespagados}}</td>
                                        <td>
                                            @if($r->pagos != null)
                                                <a href="{{url('prestamos/'. $r->id)}}">Pagos</a>
                                            @endif
                                        </td>
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



