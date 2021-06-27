<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BPO Sheet</title>
  </head>
  <body>
      <strong>BPO Sheet</strong>
      <br><br>
      @php
      $tmutu = [];
      $bahan = \App\Models\BahanBaku::select('id','nama_bahan_baku','satuan')->get();
      $b = count($bahan);

      @endphp
      <table border="1">
        <table>
          <thead>
            <tr>
              <th style="vertical-align: middle;">No</th>
              <th style="vertical-align: middle;">No. Dokumen</th>
              <th style="vertical-align: middle;">Pemesan</th>
              <th style="vertical-align: middle;">Pengirim</th>
              <th style="vertical-align: middle;">Penerima</th>
              <th style="vertical-align: middle;">Sopir</th>
              <th style="vertical-align: middle;">Tanggal Produksi</th>
              <th style="vertical-align: middle;">Mutu Produk</th>
              <th style="vertical-align: middle;">Volume</th>
              <th>Material</th>
            </tr>
            <tr>
              @php
              $col = 0;
              while($col < 9){
                echo "<th></th>";
                  $col++;
              }
              @endphp

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
                <td>{{$produksi->supir->nama_supir}}</td>
                <td>{{$produksi->waktu_produksi}}</td>
                @php
                  $mutu = $produksi->produk
                @endphp
                <td>{{$mutu->mutu_produk}}</td>
                <td>{{$produksi->volume}}</td>
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

          </tbody>

            <tfoot>
              <tr>
                <th colspan="8">Total</th>
                <th>{{ $produksis->sum('volume')}}</th>
                @php
                $a = 0;
                while($a < $b){
                  echo '<th>'.$tmutu[$a].'</th>';
                  $a++;
                }
                @endphp
              </tr>
            </tfoot>

      </table>
      <br><br>

  </body>
</html>
