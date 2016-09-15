@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Reporte financiero</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="intereses">
                                <thead>
                                <tr>
                                    <th> Fecha</th>
                                    <th> Interés depositado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->fecha}}</td>
                                        <td>{{$r->monto}}</td>
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

