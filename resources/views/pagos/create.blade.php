@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Registrar pago</div>
                <div class="panel-body">

                    {!! Form::open(['url'=>'pagos', 'class'=>'form-horizontal', 'role'=>'form'])!!}

                        @include('pagos._form')

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            </br>
                        {!! Form::submit('Registrar pago', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection