@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Acciones</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="acciones">
                                <thead>
                                    <tr>
                                        <th> Accionista</th>
                                        <th> Núm. de acciones</th>
                                        <th> Monto inversión</th>
                                    </tr>
                                </thead>
                                @foreach($result as $r)
                                    <tr>
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->numacciones}}</td>
                                        <td>{{$r->montoinversion}}</td>
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