<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="marcas-table">
            <thead>
            <tr>
                <th>Marca Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marcas as $marca)
                <tr>
                    <td>{{ $marca->mar_descrip }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['Marca.destroy', $marca->mar_cod], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('Marca.show', [$marca->mar_cod]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('Marca.edit', [$marca->mar_cod]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $marcas])
        </div>
    </div>
</div>
