@extends('layouts.admin')
@section('subtitle')
    {{"Asientos"}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

                <div class="col-md-4 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">Asientos Contables</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th> Debe</th>
                                        <th> Haber</th>
                                        <th> Monto</th>
                                        <th> Fecha</th>
                                        <th> Descripción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result as $r)
                                        <tr>
                                            <td>{{$r->id}}</td>
                                            <td>{{$r->debe}}</td>
                                            <td>{{$r->haber}}</td>
                                            <td>{{$r->monto}}</td>
                                            <td>{{$r->fecha}}</td>
                                            <td>{{$r->descripcion}}</td>
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
    {!! Form::open(['url' => 'acciones', ':STOCK_ID', 'method'=>'delete', 'id'=>'form-delete']) !!}
    {!! Form::close() !!}
@endsection
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

