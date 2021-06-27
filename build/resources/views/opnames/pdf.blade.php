<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Rekapitulasi Pemakaian Material diluar Produksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <h1 class="text-center">Rekapitulasi Pemakaian Material diluar Produksi</h1>
      <br><br>
      <table class="table table-bordered text-center">
          <thead>
              <tr>
              <th class="text-center">No</th>
              <th class="text-center">Material</th>
              <th class="text-center">Volume</th>
              <th class="text-center">Tanggal Pemakaian</th>
              <th class="text-center">Keterangan</th>
              </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
          @foreach($opnames as $opname)
              <tr>
                  <td>{!! $no++ !!}</td>
                  <td>{!! $opname->bahan_baku->nama_bahan_baku !!}</td>
                  <td>{!! number_format($opname->volume_opname,2,",",".") !!} {!! $opname->bahan_baku->satuan !!}</td>
                  <td>{!! $opname->tanggal_pemakaian !!}</td>
                  <td>{!! $opname->keterangan !!}</td>
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
