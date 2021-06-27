<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pemesanan Material</title>
  </head>
  <body>
      <strong>Rekapitulasi Pemesanan Material</strong>
      <br><br>
      <table>
          <thead>
              <tr>
              <th>No</th>
              <th>Nama Supplier</th>
              <th>Kontak</th>
              <th>Material</th>
              <th>Kuantitas</th>
              <th>Diterima</th>
              <th>Sisa</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
          @foreach($pemesananBahanBakus as $pemesananBahanBaku)
              <tr>
                @php
                  $satuan = $pemesananBahanBaku->bahan_baku->satuan;
                @endphp
                  <td>{!! $no++ !!}</td>
                  <td>{!! $pemesananBahanBaku->nama_supplier !!}</td>
                  <td>{!! $pemesananBahanBaku->cp_supplier !!}</td>
                  <td>{!! $pemesananBahanBaku->bahan_baku->nama_bahan_baku !!}</td>
                  <td>{!! $volume = $pemesananBahanBaku->volume_pemesanan !!} {!! $satuan !!}</td>
                  <td>{!! $terima = $pemesananBahanBaku->pengadaans->sum('berat') !!} {!! $satuan !!}</td>
                  <td>{!! $volume-$terima !!} {!! $satuan !!}</td>
                  <td>{!! $pemesananBahanBaku->tanggal_pemesanan->format('d-m-Y') !!}</td>
                  <td>{!! $pemesananBahanBaku->keterangan !!}</td>
              </tr>
          @endforeach
          </tbody>
      </table>

  </body>
</html>
