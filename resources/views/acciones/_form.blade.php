<div class="form-group">
    {!! Form::label('accionista', 'Accionista:', ['class' => 'col-md-4']) !!}
    <div class="col-md-6">
        {!! Form::select('accionista', $stockholders, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4']) !!}
    <div class="col-md-3">
        {!! Form::text('fecha', '', ['id' => 'datepicker', 'readonly', 'class' => 'control-label']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('n_acciones', 'Núm. acciones', ['class' => 'col-md-4']) !!}
    <div class="col-md-3">
        {!! Form::text('n_acciones', null, ['class' => 'form-control col-xs-3']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('n_acciones', 'Núm. acciones', ['class' => 'col-md-4']) !!}
    <div class="col-xs-12">
        {!! Form::text('n_acciones', null, ['class' => 'form-control']) !!}
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#n_acciones").change(function(){
                $("#monto").val($("#n_acciones").val() * 300);
            });
        });
    </script>
@endsection
