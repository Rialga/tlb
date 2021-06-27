<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Rekapitulasi Pemesanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <h1 class="text-center">Rekapitulasi Pemesanan</h1>
      <br><br>


        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">No. Dokumen</th>
              <th class="text-center">Nama Pemesan</th>
              <th class="text-center">Mutu</th>
              <th class="text-center">Lokasi Proyek</th>
              <th class="text-center">Volume Pesanan</th>
              <th class="text-center">Realisasi</th>
              <th class="text-center">Sisa Pesanan</th>
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
                <td>{{number_format($pemesanan->volume_pesanan,2,",",".")}}</td>
                <td>{{number_format($pemesanan->produksis->sum('volume'),2,",",".")}}</td>
                <td>{{number_format($pemesanan->volume_pesanan - $pemesanan->produksis->sum('volume'),2,",",".")}}</td>
              </tr>
        @endforeach
        </tbody>
      </table>

      <br><br>

      <div class="pull-right">
           Padang, {{date("d-m-Y")}}
            <br>
           Dibuat Oleh
            <br><br><br><br>
           {{$user}}
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
