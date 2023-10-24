@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Crear una nueva entidad emisora
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'entidadEmisoras.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('entidad_emisoras.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('entidadEmisoras.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
