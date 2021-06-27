<table class="table table-responsive" id="pengadaans-table">
    <thead>
        <tr>
        <th>#</th>
        <th>Material</th>
        <th>Kuantitas (kg/liter)</th>
        <th>Supplier</th>
        <th>No. Polisi</th>
        <th>Pengadaan</th>
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
            <td>{!! $pengadaan->bahan_baku->nama_bahan_baku !!}</td>
            <td>{!! number_format($pengadaan->berat,2,",",".") !!}</td>
            <td>{!! $pengadaan->pemesanan_bahan_baku->nama_supplier !!}</td>
            <td>{!! $pengadaan->supir !!}</td>
            <td>{!! $pengadaan->tanggal_pengadaan->diffForHumans() !!}</td>
            <td>
                {!! Form::open(['route' => ['pengadaans.destroy', $pengadaan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pengadaans.show', [$pengadaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pengadaans.edit', [$pengadaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
