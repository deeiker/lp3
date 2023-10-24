<!-- Id Ciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_ciudad', 'Id Ciudad:') !!}
    {!! Form::select('id_ciudad', $ciudad ,null,
     ['class' => 'form-control', "placeholder" =>"Seleccione"]) !!}
</div>

<!-- Id Departamento Field --> 
<div class="form-group col-sm-6">
    {!! Form::label('id_departamento', 'Departamento:') !!}
    {!! Form::select('id_departamento', $departamento, null, ['class' => 'form-control', "placeholder" => "Seleccione"]) !!}
</div>

<!-- Cli Ci Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_ci', 'Cli Ci:') !!}
    {!! Form::text('cli_ci', null, ['class' => 'form-control']) !!}
</div>

<!-- Cli Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_nombre', 'Cli Nombre:') !!}
    {!! Form::text('cli_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Cli Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_apellido', 'Cli Apellido:') !!}
    {!! Form::text('cli_apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Cli Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_sexo', 'Genero:') !!}
    {!! Form::select('cli_sexo',$genero, null,
    ['class' => 'form-control',
     "required"=> "required"]) !!}
</div>

<!-- Cli Fnac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_fnac', 'Cli Fnac:') !!}
    {!! Form::date('cli_fnac', null, ['class' => 'form-control','id'=>'cli_fnac']) !!}
</div>



<!-- Cli Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_direccion', 'Cli Direccion:') !!}
    {!! Form::text('cli_direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Cli Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cli_telefono', 'Cli Telefono:') !!}
    {!! Form::text('cli_telefono', null, ['class' => 'form-control']) !!}
</div>