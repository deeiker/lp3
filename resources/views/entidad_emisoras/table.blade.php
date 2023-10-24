<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="entidad-emisoras-table">
            <thead>
            <tr>
                <th>Descripcion</th>
                <th colspan="3">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entidadEmisoras as $entidadEmisora)
                <tr>
                    <td>{{ $entidadEmisora->enti_descri }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['entidadEmisoras.destroy', $entidadEmisora->enti_cod], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('entidadEmisoras.show', [$entidadEmisora->enti_cod]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('entidadEmisoras.edit', [$entidadEmisora->enti_cod]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('estas seguro de borrar este archivo?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $entidadEmisoras])
        </div>
    </div>
</div>
