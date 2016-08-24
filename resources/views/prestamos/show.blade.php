@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Detalle Pagos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Fecha</th>
                                        <th> Monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$loan->fecha}}</td>
                                        <td>{{$loan->monto}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table" id="pagos">
                                <thead>
                                    <tr>
                                        <th> Fecha</th>
                                        <th> Pago Capital</th>
                                        <th> Pago Interés</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{$payment->fecha}}</td>
                                            <td>{{$payment->montoCapital}}</td>
                                            <td>{{$payment->montoInteres}}</td>
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".btn-detalle").click(function () {
                var row = $(this).parents("tr");
                var id = row.data("id");
                console.log(id);
                window.location.href = "../prestamos/" + id;
            });
        });
    </script>
@endsection