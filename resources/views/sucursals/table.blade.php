<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="sucursals-table">
            <thead>
            <tr>
                <th>Suc Descri</th>
                <th>Suc Direccion</th>
                <th>Suc Telefono</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sucursal as $sucursales)
                <tr>
                    <td>{{ $sucursales->suc_descri }}</td>
                    <td>{{ $sucursales->suc_direccion }}</td>
                    <td>{{ $sucursales->suc_telefono }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['sucursal.destroy', $sucursales->cod_suc], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('sucursal.show', [$sucursales->cod_suc]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('sucursal.edit', [$sucursales->cod_suc]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $sucursal])
        </div>
    </div>
</div>
