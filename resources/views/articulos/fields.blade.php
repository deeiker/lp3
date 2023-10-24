<!-- Mar Cod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mar_cod', 'Mar Cod:') !!}
    {!! Form::number('mar_cod', null, ['class' => 'form-control']) !!}
</div>

<!-- Art Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('art_descripcion', 'Art Descripcion:') !!}
    {!! Form::text('art_descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Art Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('art_precio', 'Art Precio:') !!}
    {!! Form::text('art_precio', null, ['class' => 'form-control',
    "onkeyup" => "separador_miles(this)"]) !!}
</div>

<!-- Art Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('art_imagen', 'Art Imagen:') !!}
    {!! Form::text('art_imagen', null, ['class' => 'form-control']) !!}
</div>

<!-- Art Iva Field -->
<div class="form-group col-sm-6">
    {!! Form::label('art_iva', 'Art Iva:') !!}
    {!! Form::number('art_iva', null, ['class' => 'form-control']) !!}
</div>