<div class="form-group">
    {!! Form::label('monto', 'Monto interés', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('monto', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('fecha', '', ['id' => 'datepicker', 'readonly', 'class' => 'form-control col-md-6']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('concepto', 'Concepto (Opcional)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('concepto', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>


