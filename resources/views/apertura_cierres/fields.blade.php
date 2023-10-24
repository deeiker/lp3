<!-- Caj Cod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('caj_cod', 'Caj Cod:') !!}
    {!! Form::number('caj_cod', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_fecha', 'Ape Fecha:') !!}
    {!! Form::text('ape_fecha', null, ['class' => 'form-control','id'=>'ape_fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#ape_fecha').datepicker()
    </script>
@endpush

<!-- Ape Monto Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_monto_inicial', 'Ape Monto Inicial:') !!}
    {!! Form::number('ape_monto_inicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Mon Cierre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_mon_cierre', 'Ape Mon Cierre:') !!}
    {!! Form::number('ape_mon_cierre', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Fecha Cierre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_fecha_cierre', 'Ape Fecha Cierre:') !!}
    {!! Form::text('ape_fecha_cierre', null, ['class' => 'form-control','id'=>'ape_fecha_cierre']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#ape_fecha_cierre').datepicker()
    </script>
@endpush

<!-- Ape Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_total', 'Ape Total:') !!}
    {!! Form::number('ape_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_estado', 'Ape Estado:') !!}
    {!! Form::text('ape_estado', null, ['class' => 'form-control']) !!}
</div>