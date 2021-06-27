<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Rekapitulasi Pemesanan Material</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <h1 class="text-center">Rekapitulasi Pemesanan Material</h1>
      <br><br>
      <table class="table table-bordered text-center">
          <thead>
              <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Supplier</th>
              <th class="text-center">Kontak</th>
              <th class="text-center">Material</th>
              <th class="text-center">Kuantitas</th>
              <th class="text-center">Diterima</th>
              <th class="text-center">Sisa</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Keterangan</th>
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
                  @php
                      $volume = $pemesananBahanBaku->volume_pemesanan;
                      $terima = $pemesananBahanBaku->pengadaans->sum('berat');
                      $sisa = $volume-$terima;
                  @endphp
                  <td>{!! number_format($volume,2,",",".") !!} {!! $satuan !!}</td>
                  <td>{!! number_format($terima,2,",",".") !!} {!! $satuan !!}</td>
                  <td>{!! number_format($sisa,2,",",".") !!} {!! $satuan !!}</td>
                  <td>{!! $pemesananBahanBaku->tanggal_pemesanan->format('d-m-Y') !!}</td>
                  <td>{!! $pemesananBahanBaku->keterangan !!}</td>
              </tr>
          @endforeach
          </tbody>
      </table>



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
