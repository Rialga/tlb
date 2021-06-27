<table class="table table-responsive" id="supirs-table">
    <thead>
        <tr>
          <th>#</th>
            <th>No Supir</th>
        <th>Nama Supir</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
    @foreach($supirs as $supir)
        <tr>
          <td>{!! $no++ !!}</td>
            <td>{!! $supir->no_supir !!}</td>
            <td>{!! $supir->nama_supir !!}</td>
            <td>
                {!! Form::open(['route' => ['supirs.destroy', $supir->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('supirs.show', [$supir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('supirs.edit', [$supir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
