@extends('layouts.admin')

@section('title')
    Registrar préstamo
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Registrar préstamo</div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'prestamos', 'class'=>'form-horizontal', 'role'=>'form'])!!}
                        @include('prestamos._form')
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
                            </br>
                        {!! Form::submit('Registrar préstamo', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection