<div class="table-responsive">
  <table class="table" id="pemesanans-table">
    <thead>
      <tr>
        <th width="15vw">#</th>
        <th width="100vw">Pemesan</th>
        <th width="100vw">Lokasi</th>
        <th width="100vw">Mutu</th>
        <th width="100vw">Tanggal Kirim</th>
        <th width="100vw">Status</th>
        <th width="100vw">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $no = 1; @endphp
      @foreach($pemesanans as $pemesanan)
      <tr>
        <td width="15vw">{{ $no++ }}</td>
        <td width="100vw">{!! $pemesanan->nama_pemesanan !!}</td>
        <td width="100vw">{!! $pemesanan->lokasi_proyek !!}</td>
        <td width="100vw">{!! $pemesanan->mutu !!}</td>
        <td width="100vw">{!! $pemesanan->tanggal_kirim_dari->format('d F y h:m') !!}</td>
        @php
          $sisa = $pemesanan->volume_pesanan - $pemesanan->produksis->sum('volume');
        @endphp
        <td width="100vw">{!! $sisa > 0 ? 'Sisa '.number_format($sisa,2,",",".").' Kg' : 'Selesai' !!}</td>
        <td width="100vw">
          {!! Form::open(['route' => ['pemesanans.destroy', $pemesanan->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{!! route('pemesanans.produksis.index', [$pemesanan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="{!! route('pemesanans.show', [$pemesanan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>

            @if (Auth::user()->is('marketing') || Auth::user()->is('admin') || Auth::user()->is('manager_produksi'))
              <a href="{!! route('pemesanans.edit', [$pemesanan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
              {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
              btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            @endif

          </div>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th width="15vw"></th>
        <th width="100vw"><input class="col-sm-12" type="text" placeholder="Pemesan" /></th>
        <th width="100vw"><input class="col-sm-12" type="text" placeholder="Lokasi" /></th>
        <th width="100vw"><input class="col-sm-12" type="text" placeholder="Mutu" /></th>
        <th width="100vw"><input class="col-sm-12" type="text" placeholder="Tanggal" /></th>
        <th width="100vw"></th>
        <th width="100vw"></th>
      </tr>
    </tfoot>
  </table>
</div>
