<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Histori Material</title>
  </head>
  <body>
      <strong>Rekapitulasi Material</strong>
      <br><br>
      <p>Tanggal : {{$dari ? \Carbon\Carbon::parse($dari)->format('d F Y') : 'Semua Waktu'}} {{ $sampai ? ' - '.\Carbon\Carbon::parse($sampai)->format('d F Y') : ''}}</p>
        <table>
          <thead>
            <tr>
              <th>Nama Material</th>
              <th>Satuan</th>
              <th>Stock</th>
              <th>Masuk</th>
              <th>Keluar</th>
              <th>Jumlah</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($stock as $key => $value)
              @php
                $bb = \App\Models\BahanBaku::find($key);
              @endphp
              <tr>
                <th>{{ $bb->nama_bahan_baku }}</th>
                <td>{{ $bb->satuan }}</td>
                <td>{{ $value['stock'] - $value['masuk'] + $value['keluar'] }}</td>
                <td>{{ $value['masuk'] }}</td>
                <td>{{ $value['keluar'] }}</td>
                <td>{{ $value['stock'] }}</td>
              </tr>
            @endforeach

          </tbody>
      </table>
  </body>
</html>
