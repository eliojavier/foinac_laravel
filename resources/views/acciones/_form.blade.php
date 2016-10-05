<div class="form-group">
    {!! Form::label('accionista', 'Accionista:', ['class'=>"col-md-4"]) !!}
    <div class="col-md-3">
        {!! Form::select('accionista', $stockholders, ['class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fecha', 'Fecha', ['class'=>"col-md-4"]) !!}
    <div class="col-md-3">
        {!! Form::text('fecha', '', ['id' => 'datepicker', 'readonly', 'class'=>'form-control', 'placeholder'=>'dd/mm/aaaa']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('n_acciones', 'Núm. acciones', ['class' => 'col-md-4']) !!}
    <div class="col-md-3">
        {!! Form::text('n_acciones', null, ['class' => 'form-control']) !!}
    </div>
</div>

{{--<div class="form-group">--}}
    {{--{!! Form::label('n_acciones', 'Núm. acciones', ['class' => 'col-md-4']) !!}--}}
    {{--<div class="col-md-3">--}}
        {{--{!! Form::text('monto', null, ['id'=>'monto', 'class' => 'form-control']) !!}--}}
    {{--</div>--}}
{{--</div>--}}

@section('scripts')
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$("#n_acciones").change(function(){--}}
                {{--$("#monto").val($("#n_acciones").val() * 300);--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection
