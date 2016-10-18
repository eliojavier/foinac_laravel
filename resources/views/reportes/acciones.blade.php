@extends('layouts.admin')

@section('content')
    <div class="form-group">
        {!!Form::label('','Total capital acciones: ')!!}
        {{$TOTAL_ACCIONES}}
    </div>

    <div class="form-group">
        {!!Form::label('','Total intereses préstamos: ')!!}
        {{$TOTAL_INTERESES_PRESTAMOS}}
    </div>

    <div class="form-group">
        {!!Form::label('','Total intereses banco: ')!!}
        {{$TOTAL_INTERESES_BANCO}}
    </div>

    <div class="form-group">
        {!!Form::label('','Total ganancias: ')!!}
        {{$TOTAL_GANANCIAS}}
    </div>

    <div class="form-group">
        {!!Form::label('','Total gastos: ')!!}
        {{$TOTAL_GASTOS}}
    </div>

    <div class="form-group">
        {!!Form::label('','Cuentas por cobrar: ')!!}
        {{$CUENTAS_POR_COBRAR}}
    </div>

    <div class="form-group">
        {!!Form::label('','Total disponible: ')!!}
        {{$TOTAL_DISPONIBLE}}
    </div>

    <button type="button" class="btn" id="bAcciones">Acciones</button>
    <div ng-app="">
        <p>My first expression: {{ 5 + 5 }}</p>
    </div>
@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            $('#bAcciones').click(function(){
                $.ajax({
                    url: 'reportes/acciones',
                    type: 'GET',
                    success:function(result)
                    {
                        console.log('Successfully called:' + result);
                    },
                    error:function(exception){alert('Exeption: ' + exception);}
                });
//                $.get('reportes/acciones', function (data) {
//                    console.log(data);
//                })
            });
        });
    </script>

    {{--<script>--}}
        {{--var app = angular.module('myApp', []);--}}
        {{--app.controller('customersCtrl', function($scope, $http) {--}}
            {{--$http.get("reportes/acciones").then(function(response) {--}}
                {{--$scope.myData = response.data.records;--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection
