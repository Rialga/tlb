<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Terima Material</title>
  </head>
  <body>
      <strong>Rekapitulasi Penerimaan Material</strong>
      <br><br>
          @foreach ($suppliers as $supplier)
          @php
          $i=0;
          // $pengadaans = \App\Models\Pengadaan::hydrate($supplier->pengadaans);
          // $pengadaans = $pengadaans->flatten();
          $pengadaans = $supplier->pengadaans;
          $bahan_baku = new \App\Models\BahanBaku();
          $supplier->bahan_baku = $bahan_baku->fill($supplier->bahan_baku);

          @endphp

          <div class="pull-left">
            <table>
              <tbody>
                <tr>
                  <th>Nama Supplier</th>
                  <td>{!! $supplier->nama_supplier !!}</td>
                </tr>
                <tr>
                  <th>Nama Material</th>
                  <td>{!! $supplier->bahan_baku->nama_bahan_baku !!}</td>
                </tr>
                <tr>
                  <th>Satuan</th>
                  <td>{!! $supplier->bahan_baku->satuan !!}</td>
                </tr>
                <tr>
                  <th>Kuantitas Pesanan</th>
                  <td>{!! $pesanan = $supplier->volume_pemesanan !!}</td>
                </tr>
                <tr>
                  <th>Realisasi</th>
                  <td>{!! $real = $pengadaans->sum('berat'); !!}</td>
                </tr>
                <tr>
                  <th>Sisa Pesanan</th>
                  <td>{!! $sisa = $pesanan-$real !!}</td>
                </tr>
              </tbody>
            </table>
          </div>

        <br>

        <table>
        <thead>
          <tr>
            <th>No</th>
            <th>No. Dokumen</th>
            <th>Tanggal Pengiriman</th>
            <th>No. Polisi</th>
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Volume</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($pengadaans as $key => $pengadaan)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$pengadaan->nomor_dokumen}}</td>
            <td>{{$pengadaan->tanggal_pengadaan}}</td>
            <td>{{$pengadaan->supir}}</td>
            <td>{{$pengadaan->nama_pengirim}}</td>
            <td>{{$pengadaan->nama_penerima}}</td>
            <td>{{$pengadaan->berat}}</td>
          </tr>
          @endforeach

          @endforeach
          <tfoot>
            <tr>
              <th colspan="6">Total</th>
              <th>{{$real}}</th>
            </tr>
          </tfoot>
        </tbody>
      </table>
  </body>
</html>
