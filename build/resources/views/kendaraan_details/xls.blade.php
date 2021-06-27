<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Status Kendaraan</title>
  </head>
  <body>
      <strong>Rekapitulasi Status Kendaraan</strong>
      <br><br>

      <div class="pull-left">
        <table>
          <tr>
            <th>No Polisi </th>
            <td>{{$kendaraan->no_polisi}}</td>
          </tr>
          <tr>
            <th>Jenis Kendaraan </th>
            <td>{{$kendaraan->jenis_kendaraan}}</td>
          </tr>
          <tr>
            <th>Masa Berlaku Pajak </th>
            <td>{{$kendaraan->masa_pajak->format('d F Y')}}</td>
          </tr>
          <tr>
            <th>Masa Berlaku STNK </th>
            <td>{{$kendaraan->masa_stnk->format('d F Y')}}</td>
          </tr>
          <tr>
            <th>Masa Berlaku KIR </th>
            <td>{{$kendaraan->masa_kir->format('d F Y')}}</td>
          </tr>
          <tr>
            <th>Jumlah Hari StandBy </th>
            <td>{{$standby}}</td>
          </tr>
          <tr>
            <th>Jumlah Hari Rusak </th>
            <td>{{$rusak}}</td>
          </tr>
          <tr>
            <th>Jumlah Hari Rental </th>
            <td>{{$rental}}</td>
          </tr>
        </table>
      </div>
      <br>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Status Kendaran</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          @foreach ($details as $key => $detail)
          <tbody>
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$detail->waktu}}</td>
                <td>{{$status[$detail->status]}}</td>
                <td>{{$detail->keterangan}}</td>
              </tr>
        @endforeach

        </tbody>
      </table>
  </body>
</html>
