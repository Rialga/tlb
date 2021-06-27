<table class="table table-responsive" id="komposisiMutus-table">
    <thead>
        <tr>
            <th>Produk Id</th>
        <th>Material Id</th>
        <th>Volume</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($komposisiMutus as $komposisiMutu)
        <tr>
            <td>{!! $komposisiMutu->produk_id !!}</td>
            <td>{!! $komposisiMutu->bahan_baku_id !!}</td>
            <td>{!! $komposisiMutu->volume !!}</td>
            <td>
                {!! Form::open(['route' => ['komposisiMutus.destroy', $komposisiMutu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('komposisiMutus.show', [$komposisiMutu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('komposisiMutus.edit', [$komposisiMutu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>