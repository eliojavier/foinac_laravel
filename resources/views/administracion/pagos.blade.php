@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Pagos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th> Accionista</th>
                                    <th> Préstamo</th>
                                    <th> Monto capital</th>
                                    <th> Monto interés</th>
                                </tr>
                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->monto}}</td>
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