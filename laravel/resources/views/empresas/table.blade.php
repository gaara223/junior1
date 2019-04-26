<table class="table" id="empresas-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empresas as $empresas)
        <tr>
            <td>{!! $empresas->name !!}</td>
            <td>{!! $empresas->email !!}</td>
            <td>{!! $empresas->website !!}</td>
            <td>
                {!! Form::open(['route' => ['empresas.destroy', $empresas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empresas.show', [$empresas->id]) !!}" class='btn btn-light btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('empresas.edit', [$empresas->id]) !!}" class='btn btn-light btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta segur@?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>