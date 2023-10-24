<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="ventas-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Id Cliente</th>
                <th>Fecha</th>
                <th>Condicion</th>
                <th>Venta Total</th>
                <th>Estado</th>
                <th>Cuotas</th>
                <th>Nro Factura</th>
                <th>Sucursal</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $ventas->id_ventas }}</td>
                    <td>{{ $ventas->cli_nombre. " ". $ventas->cli_apellido }}</td>
                    <td>{{ \Carbon\Carbon::parse($venta->ven_fecha)->format("d/m/Y")}}</td>
                    <td>{{ $ventas->ven_fecha }}</td>
                    <td>{{ $ventas->ven_condicion }}</td>
                    <td>{{ $ventas->ven_total }}</td>
                    <td>{{ $ventas->ven_estado }}</td>
                    <td>{{ $ventas->cant_cuo }}</td>
                    <td>{{ $ventas->nro_factura }}</td>
                    <td>{{ $ventas->cod_suc }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['ventas.destroy', $ventas->id_venta], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ventas.show', [$ventas->id_venta]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ventas.edit', [$ventas->id_venta]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $ventas])
        </div>
    </div>
</div>
