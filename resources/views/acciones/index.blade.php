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
                                    <th> Editar</th>
                                    <th> Eliminar</th>
                                </tr>
                                </thead>
                                @foreach($result as $r)
                                    <tr data-id="{{$r->id}}">
                                        <td>{{$r->accionista}}</td>
                                        <td>{{$r->numacciones}}</td>
                                        <td>{{$r->montoinversion}}</td>
                                        <td>Editar</td>
                                        <td><a href="" class="btn-delete">Eliminar</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['url' => 'acciones', ':STOCK_ID', 'method'=>'delete', 'id'=>'form-delete']) !!}
    {!! Form::close() !!}
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".btn-delete").click(function () {
                var row = $(this).parents("tr");
                var id = row.data("id");
                var form = $("#form-delete");

                alert(form.attr('action'));
            });
        });
    </script>
@endsection

@endsection