<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Produksi</title>
  </head>
  <body>
      <strong>Rekapitulasi Produksi</strong>
      <br><br>

          <div>
            <table>
              <tbody>
                <tr>
                  <td style="border : none"><strong>No. Dokumen  </strong></td>
                  <td style="border : none">: {!! $pemesanans->nomor_dokumen !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Nama Pemesan  </strong></td>
                  <td style="border : none">: {!! $pemesanans->nama_pemesanan !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Lokasi Proyek  </strong></td>
                  <td style="border : none">: {!! $pemesanans->lokasi_proyek !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Mutu  </strong></td>
                  <td style="border : none">: {!! $pemesanans->mutu !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Volume Pesanan  </strong></td>
                  <td style="border : none">: {!! $vpesanan = $pemesanans->volume_pesanan !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Realisasi  </strong></td>
                  <td style="border : none">: {!! $vproduksi = $volume !!}</td>
                </tr>
                <tr>
                  <td style="border : none"><strong>Sisa  </strong></td>
                  <td style="border : none">: {!! $vpesanan-$vproduksi !!}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <br>

    <table>
        <thead>
          <tr>
            <th>No</th>
            <th>No. Dokumen</th>
            <th>Tanggal Pengiriman</th>
            <th>No. Polisi</th>
            <th>Penerima</th>
            <th>Volume</th>
          </tr>
        </thead>

        <tbody>

          @foreach ($produksi as $data)
          <tr>
            <td>{{$key++}}</td>
            <td>{{$data->nomor_dokumen}}</td>
            <td>{{$data->waktu_produksi->format('d F Y h:m')}}</td>
            <td>{{$data->kendaraan->no_polisi}}</td>
            <td>{{$data->nama_penerima}}</td>
            <td>{{$data->volume}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
  </body>
</html>
