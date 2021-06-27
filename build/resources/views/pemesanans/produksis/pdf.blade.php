<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Rekapitulasi Produksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <h1 class="text-center">Rekapitulasi Produksi</h1>
      <br><br>
          @foreach ($pemesanans as $pemesanan)
          @php
          $i=0;
          $produksis = $pemesanan->produksis;
          // $produksis = $produksis->flatten();
          $sisa = $produksis->sum('volume');

          @endphp
          <div class="pull-left">
            <table>
              <tbody>
                <tr>
                  <td style="border : none"><strong>No. Dokumen  </strong></td>
                  <td style="border : none">: {!! $pemesanan->nomor_dokumen !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Nama Pemesan  </strong></td>
                  <td style="border : none">: {!! $pemesanan->nama_pemesanan !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Lokasi Proyek  </strong></td>
                  <td style="border : none">: {!! $pemesanan->lokasi_proyek !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Mutu  </strong></td>
                  <td style="border : none">: {!! $pemesanan->mutu !!}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="pull-right">
            <table>
              <tbody>
                <tr>
                  <td style="border : none"><strong>Volume Pesanan  </strong></td>
                  @php
                      $pesanan = $pemesanan->volume_pesanan;
                  @endphp
                  <td style="border : none">: {!! number_format($pesanan,2,",",".") !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Realisasi  </strong></td>
                  @php
                      $produksi = $produksis->sum('volume');
                  @endphp
                  <td style="border : none">: {!! number_format($produksi,2,",",".") !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Sisa  </strong></td>
                  <td style="border : none">: {!! number_format($pesanan-$produksi,2,",",".") !!}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix">

          </div>
          <br>

<table class="table table-bordered text-center">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">No. Dokumen</th>
            <th class="text-center">Tanggal Pengiriman</th>
            <th class="text-center">No. Polisi</th>
            <th class="text-center">Penerima</th>
            <th class="text-center">Volume (Kg)</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($produksis as $key => $produksi)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$produksi->nomor_dokumen}}</td>
            <td>{{$produksi->waktu_produksi->format('d F Y h:m')}}</td>
            <td>{{$produksi->kendaraan->no_polisi}}</td>
            <td>{{$produksi->nama_penerima}}</td>
            <td>{{number_format($produksi->volume,2,",",".")}}</td>
          </tr>
          @endforeach

          @endforeach
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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



  </body>
</html>
