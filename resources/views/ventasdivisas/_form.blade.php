<div class="form-group">
    {!! Form::label('cantidad', 'Divisas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('cantidad', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('monto', 'Bolívares', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('monto', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('moneda', 'Moneda', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!!Form::select('moneda', $monedas, null, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('fecha', '', ['id' => 'datepicker', 'readonly']) !!}
    </div>
</div>