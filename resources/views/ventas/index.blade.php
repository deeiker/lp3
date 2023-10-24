@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5">
                    <h1>Ventas</h1>
                </div>
                <div class="col-sm-6">
                    @if (!empty($cajaAbierta)
                    && \Carbon\Carbon::parse($venta->ven_fecha)->format('d/m/Y') == 
                    \Carbon\Carbon::now()->format('d/m/Y'))
                    <a class="btn btn-primary float-right"
                    href="{{ route('ventas.create') }}">
                        Nueva Venta
                    </a>
                    @endif

                    @if (empty($cajaAbierta))
                    <a class="btn btn-default"
                    data-toggle="modal" data-target="#apertura"
                    style="margin-right: 10xp"
                    href="#">
                        Abrir Caja
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('sweetalert::alert')

        <div class="clearfix"></div>

        <div class="card">
            @include('ventas.table')
        </div>
    </div>


    @include("ventas.Modal_Apertura_Cierre")
@endsection
