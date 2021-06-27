<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Rekapitulasi Material</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <h1 class="text-center">Rekapitulasi Penerimaan Material</h1>
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
                  <td><strong>Nama Supplier </strong></td>
                  <td> : </td>
                  <td>{!! $supplier->nama_supplier !!}</td>
                </tr>
                <tr>
                  <td><strong>Nama Material </strong></td>
                  <td> : </td>
                  <td>{!! $supplier->bahan_baku->nama_bahan_baku !!}</td>
                </tr>
                <tr>
                  <td><strong>Satuan </strong></td>
                  <td> : </td>
                  <td>{!! $supplier->bahan_baku->satuan !!}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="pull-right">
            <table>
              <tbody>
                <tr>
                  <td><strong>Kuantitas Pesanan </strong></td>
                  <td> : </td>
                  @php
                      $pesanan = $supplier->volume_pemesanan;
                      $real = $pengadaans->sum('berat');
                      $sisa = $pesanan-$real;
                  @endphp
                  <td>{!! number_format($pesanan,2,",",".") !!}</td>
                </tr>
                <tr>
                  <td><strong>Realisasi </strong></td>
                  <td>:</td>
                  <td>{!! number_format($real,2,",",".") !!}</td>
                </tr>
                <tr>
                  <td><strong>Sisa Pesanan </strong></td>
                  <td> : </td>
                  <td>{!! number_format($sisa,2,",",".") !!}</td>
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
            <th class="text-center">Pengirim</th>
            <th class="text-center">Penerima</th>
            <th class="text-center">Volume</th>
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
            <td>{{number_format($pengadaan->berat,2,",",".")}}</td>
          </tr>
          @endforeach

          @endforeach
          <tfoot>
            <tr>
              <td colspan="6"><strong>Total</strong></td>
              <td><strong>{{$real}}</strong></td>
            </tr>
          </tfoot>
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
