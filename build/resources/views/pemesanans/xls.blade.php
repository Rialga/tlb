<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Pemesanan</title>
  </head>
  <body>
      <strong>Rekapitulasi Pemesanan</strong>
      <br><br>


        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>No. Dokumen</th>
              <th>Nama Pemesan</th>
              <th>Mutu</th>
              <th>Lokasi Proyek</th>
              <th>Volume Pesanan</th>
              <th>Realisasi</th>
              <th>Sisa Pesanan</th>
            </tr>
          </thead>
          @php
            $jenis = ['Retail', 'Non Retail'];
            $no = 1;
          @endphp
          <tbody>
          @foreach ($pemesanans as $pemesanan)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$pemesanan->nomor_dokumen}}</td>
                <td>{{$pemesanan->nama_pemesanan}}</td>
                <td>{{$pemesanan->mutu}}</td>
                <td>{{$pemesanan->lokasi_proyek}}</td>
                <td>{{$pemesanan->volume_pesanan}}</td>
                <td>{{$pemesanan->produksis->sum('volume')}}</td>
                <td>{{$pemesanan->volume_pesanan - $pemesanan->produksis->sum('volume')}}</td>
              </tr>
        @endforeach
        </tbody>
      </table>
  </body>
</html>
