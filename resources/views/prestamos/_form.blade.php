<div class="form-group">
    {!! Form::label('accionista', 'Accionista:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('accionista', $stockholders, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('fecha', '', ['id' => 'datepicker', 'readonly']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('monto', 'Monto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('monto', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>

