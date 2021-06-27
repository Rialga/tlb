<table class="table" id="produksis-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Pemesanan</th>
      <th>Kendaraan</th>
      <th>Volume (m³)</th>
      <th>Pengiriman</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $no =1;
    @endphp
    @foreach($produksis as $produksi)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{!! $produksi->pemesanan->nama_pemesanan !!}</td>
      <td>{!! $produksi->kendaraan->no_polisi !!}</td>
      <td>{!! number_format($produksi->volume,2,",",".") !!}</td>
      <td>{!! $produksi->waktu_produksi->diffForHumans() !!}</td>
      <td>
        {!! Form::open(['route' => ['produksis.destroy', $produksi->id], 'method' => 'delete']) !!}
        <div class='btn-group'>
          <a href="{!! route('produksis.show', [$produksi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>

          @if (Auth::user()->is('produksi') || Auth::user()->is('manager_produksi') || Auth::user()->is('admin'))
            <a href="{!! route('produksis.edit', [$produksi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
          @endif
        </div>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
