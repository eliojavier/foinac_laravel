@extends('layouts.admin')
@section('subtitle')
    {{"Acciones"}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-3 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-default">
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
                                <tbody>
                                @foreach($result as $r)
                                    <tr data-id="{{$r->id}}">
                                        <td>{{$r->accionista}}</td>
                                        <td>{{round($r->numacciones)}}</td>
                                        <td>{{$r->montoinversion}}</td>
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

