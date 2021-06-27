<table class="table table-responsive" id="pengadaans-table">
    <thead>
        <tr>
        <th>#</th>
        <th>Kuantitas (kg/liter)</th>
        <th>Supir</th>
        <th>Waktu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
    @foreach($pengadaans as $pengadaan)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{!! number_format($pengadaan->berat,2,",",".") !!}</td>
            <td>{!! $pengadaan->supir !!}</td>
            <td>{!! $pengadaan->tanggal_pengadaan->diffForHumans() !!}</td>
            <td>
                {!! Form::open(['route' => ['supplier.pengadaans.destroy', $supplier,$pengadaan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('supplier.pengadaans.show', [$supplier,$pengadaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('supplier.pengadaans.edit', [$supplier,$pengadaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
