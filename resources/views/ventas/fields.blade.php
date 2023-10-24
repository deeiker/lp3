<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::number('id_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Ven Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ven_fecha', 'Ven Fecha:') !!}
    {!! Form::text('ven_fecha', null, ['class' => 'form-control','id'=>'ven_fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#ven_fecha').datepicker()
    </script>
@endpush

<!-- Ven Condicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ven_condicion', 'Ven Condicion:') !!}
    {!! Form::text('ven_condicion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ven Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ven_total', 'Ven Total:') !!}
    {!! Form::number('ven_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Ven Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ven_estado', 'Ven Estado:') !!}
    {!! Form::text('ven_estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Cant Cuo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cant_cuo', 'Cant Cuo:') !!}
    {!! Form::number('cant_cuo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nro Factura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nro_factura', 'Nro Factura:') !!}
    {!! Form::text('nro_factura', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Nro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_nro', 'Ape Nro:') !!}
    {!! Form::number('ape_nro', null, ['class' => 'form-control']) !!}
</div>

<!-- Cod Suc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_suc', 'Cod Suc:') !!}
    {!! Form::number('cod_suc', null, ['class' => 'form-control']) !!}
</div>