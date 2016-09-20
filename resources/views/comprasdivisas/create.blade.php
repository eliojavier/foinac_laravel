@extends('layouts.admin')

@section('title')
    Registrar compra divisas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Registrar compra divisas</div>
                    <div class="panel-body">

                        {!! Form::open(['url'=>'comprasdivisas', 'class'=>'form-horizontal', 'role'=>'form'])!!}

                        @include('comprasdivisas._form')

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                </br>
                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection