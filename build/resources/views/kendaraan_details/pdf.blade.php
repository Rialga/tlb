<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Status Kendaraan <strong>{{$kendaraan->jenis_kendaraan}} ({{$kendaraan->no_polisi}})</strong></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <h1 class="text-center">Rekapitulasi Status Kendaraan</h1>
      <br><br>

      <div class="pull-left">
        <table>
          <tr>
            <th>No Polisi </th>
            <th> : </th>
            <td>{{$kendaraan->no_polisi}}</td>
          </tr>
          <tr>
            <th>Jenis Kendaraan </th>
            <th> : </th>
            <td>{{$kendaraan->jenis_kendaraan}}</td>
          </tr>
          <tr>
            <th>Masa Berlaku Pajak </th>
            <th> : </th>
            <td>{{$kendaraan->masa_pajak->format('d F Y')}}</td>
          </tr>
          <tr>
            <th>Masa Berlaku STNK </th>
            <th> : </th>
            <td>{{$kendaraan->masa_stnk->format('d F Y')}}</td>
          </tr>
        </table>
      </div>
      <div class="pull-right">
        <table>
          <tr>
            <th>Masa Berlaku KIR </th>
            <th> : </th>
            <td>{{$kendaraan->masa_kir->format('d F Y')}}</td>
          </tr>
          <tr>
            <th>Jumlah Hari StandBy </th>
            <th> : </th>
            <td>{{$standby}}</td>
          </tr>
          <tr>
            <th>Jumlah Hari Rusak </th>
            <th> : </th>
            <td>{{$rusak}}</td>
          </tr>
          <tr>
            <th>Jumlah Hari Rental </th>
            <th> : </th>
            <td>{{$rental}}</td>
          </tr>
        </table>
      </div>
      <div class="clearfix">

      </div>
      <br>
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Status Kendaran</th>
              <th class="text-center">Keterangan</th>
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
