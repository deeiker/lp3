<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="ciudads-table">
            <thead>
            <tr>
                <th>Ciudad Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ciudads as $ciudad)
                <tr>
                    <td>{{ $ciudad->ciu_descripcion }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['ciudads.destroy', $ciudad->ciu_descripcion], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ciudads.show', [$ciudad->ciu_descripcion]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ciudads.edit', [$ciudad->ciu_descripcion]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('estas seguro de eliminar?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $ciudads])
        </div>
    </div>
</div>
