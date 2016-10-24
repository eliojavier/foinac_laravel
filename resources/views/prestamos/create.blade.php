@extends('layouts.admin')

@section('title')
    Registrar préstamo
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-xs-12">
            @if (session('status'))
                <div class="text-center alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading text-center">Registrar préstamo</div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'prestamos', 'class'=>'form-horizontal', 'role'=>'form'])!!}
                        @include('prestamos._form')
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
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