<div class="form-group">
    {!! Form::label('prestamo', 'Prestamo:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('prestamo', $prestamos, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('fecha', '', ['id' => 'datepicker']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('monto', 'Monto Interés', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('montoInteres', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('monto', 'Monto Capital', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('montoCapital', null, ['class' => 'form-control col-md-6']) !!}
    </div>
</div>

