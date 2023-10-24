<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="apertura-cierres-table">
            <thead>
            <tr>
                <th>Caj Cod</th>
                <th>User Id</th>
                <th>Ape Fecha</th>
                <th>Ape Monto Inicial</th>
                <th>Ape Mon Cierre</th>
                <th>Ape Fecha Cierre</th>
                <th>Ape Total</th>
                <th>Ape Estado</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($aperturaCierres as $aperturaCierre)
                <tr>
                    <td>{{ $aperturaCierre->caj_cod }}</td>
                    <td>{{ $aperturaCierre->user_id }}</td>
                    <td>{{ $aperturaCierre->ape_fecha }}</td>
                    <td>{{ $aperturaCierre->ape_monto_inicial }}</td>
                    <td>{{ $aperturaCierre->ape_mon_cierre }}</td>
                    <td>{{ $aperturaCierre->ape_fecha_cierre }}</td>
                    <td>{{ $aperturaCierre->ape_total }}</td>
                    <td>{{ $aperturaCierre->ape_estado }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['aperturaCierres.destroy', $aperturaCierre->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('aperturaCierres.show', [$aperturaCierre->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('aperturaCierres.edit', [$aperturaCierre->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $aperturaCierres])
        </div>
    </div>
</div>
