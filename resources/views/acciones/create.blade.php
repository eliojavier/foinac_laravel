@extends('app')

@section('title')
    Registrar acción
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Registrar acción</div>
                <div class="panel-body">

                    {!! Form::open(['url'=>'acciones', 'class'=>'form-horizontal', 'role'=>'form'])!!}

                    @include('acciones._form')

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            </br>
                        {!! Form::submit('Registrar acción', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection