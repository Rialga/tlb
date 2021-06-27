<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak BPO Sheet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
      .table{
        font-size: 9px;
      }
    </style>
  </head>
  <body>
   <div class="content-wrapper">
    <div class="content">
      <h1 class="text-center">BPO Sheet</h1>
      <br><br>
      @php
      $tmutu = [];
      $bahan = \App\Models\BahanBaku::select('id','nama_bahan_baku','satuan')->get();
      $b = count($bahan);

      @endphp
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">No</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">No. Dokumen</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Pemesan</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Pengirim</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Penerima</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Sopir</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Tanggal Produksi</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Mutu Produk</th>
            <th rowspan="2" class="text-center align-middle" style="vertical-align: middle;">Volume</th>
            <th colspan="{{$b}}" class="text-center">Material</th>
          </tr>
          <tr>
            @foreach($bahan as $key => $bhn)
            <th>{{$bhn->nama_bahan_baku}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @php
          $h = 0;
          while($h<$b){
            $tmutu[$h] = 0;
            $h++;
          }
          @endphp
          @foreach ($produksis as $key => $produksi)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$produksi->nomor_dokumen}}</td>
              <td>{{$produksi->pemesanan->nama_pemesanan}}</td>
              <td>{{$produksi->nama_pengirim}}</td>
              <td>{{$produksi->nama_penerima}}</td>
              <td>{{$supir[$produksi->supir_id]}}</td>
              <td>{{$produksi->waktu_produksi}}</td>
              @php
                $mutu = $produksi->produk;
              @endphp
              <td>{{$mutu->mutu_produk}}</td>
              <td>{{number_format($produksi->volume,2,",",".")}}</td>
            @php
             $komposisi_mutu = $produksi->produk->komposisi_mutus;
             $i = 0;
            @endphp

              @foreach ($komposisi_mutu as $key => $komposisi)
                <td>{!! $komposisi->volume * $produksi->volume!!}</td>
                @php
                  if ($tmutu[$i]<=0) {
                    $tmutu[$i] = $komposisi->volume * $produksi->volume;
                  }else{
                      $tmutu[$i] += $komposisi->volume * $produksi->volume;
                  }
                  $i++;
                @endphp
              @endforeach
              @php
              while($i<$b){
                echo "<td>0</td>";
                  if ($tmutu[$i]>=0) {
                      $tmutu[$i] += 0;
                  }
                  $i++;
              }
              @endphp
            </tr>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="8" class="text-center">Total</th>
              <th class="text-center">{{ $produksis->sum('volume')}}</th>
              @php
              $a = 0;
              while($a < $b){
                echo '<th class="text-center">'.$tmutu[$a].'</th>';
                $a++;
              }
              @endphp
            </tr>
          </tfoot>


          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </tbody>
      </table>
      
      <div class="clearfix">
      </div>
      <br><br>
      <div class="pull-right">
           Padang, {{date("d-m-Y")}}
            <br>
           Dibuat Oleh
            <br><br><br><br>
           {{$user}}
      </div>
     </div>
    </div>
  </body>
</html>
