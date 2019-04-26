<table class="table" id="empleados-table">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleados)
        <tr>
            <td>{!! $empleados->first_name !!}</td>
            <td>{!! $empleados->last_name !!}</td>
            <td>{!! $empresas[$empleados->company_id] ?? '' !!}</td>
            <td>
                {!! Form::open(['route' => ['empleados.destroy', $empleados->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empleados.show', [$empleados->id]) !!}" class='btn btn-light btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('empleados.edit', [$empleados->id]) !!}" class='btn btn-light btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta segur@?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>