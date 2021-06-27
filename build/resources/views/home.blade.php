@extends('layouts.app')

@section('content')
  <div class="card-header">
    <section class="content-header">
    <h1>
      Beranda
      <small>Dashboard</small>
    </h1>
  </section>
  </div>
  <section class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="row">

      <div class="col-md-4">
        <div class="box box-solid box-success">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Sekarang</h3>
          </div>
          <div class="box-body" style="text-align: center">
              <h4><strong>{{ $tgl }} </strong></h4>
          </div>
        </div>

        <div class="box box-solid box-info">
          <div class="box-header">
            <i class="fa fa-product-hunt"></i>
            <h3 class="box-title">Produksi</h3>
          </div>
          <div class="box-body">
            <table class="table table-hover">
              <tbody>
              <tr>
                <th>Kemarin</th>
                <td><strong>{{ number_format($kemarin) }}</strong> m<sup>3</sup></td>
              </tr>
              <tr>
                <th>Bulan Ini</th>
                <td><strong>{{ number_format($bulanini) }}</strong> m<sup>3</sup></td>
              </tr>
              <tr>
                <th>Bulan Lalu</th>
                <td><strong>{{ number_format($bulanlalu) }}</strong> m<sup>3</sup></td>
              </tr>
              <tr>
                <th>Volume Permintaan</th>
                <td><strong>{{ number_format($volume_permintaan) }}</strong> m<sup>3</sup></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="col-md-8">
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Status Material</h3>
          </div>
          <div class="box-body">
            <div class="row">
              @foreach($bahanBakus as $bahanBaku)
                @php
                  $sisa = $bahanBaku->sisa;
                @endphp
              <div class="col-md-3 col-xs-5">
                <!-- small box -->
                <div class="small-box {{ $sisa < 250 ? 'bg-red' : ($sisa < 500 ? 'bg-yellow' : ($sisa < 1000 ? 'bg-green' : 'bg-aqua')) }}" sty>
                  <div class="inner">
                    <h4>{!! number_format($bahanBaku->sisa) !!}</h4>

                    <p>{!! $bahanBaku->satuan !!}</p>
                  </div>
                  <a href="#" class="small-box-footer">{!! $bahanBaku->nama_bahan_baku !!}</i></a>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>


      <div class="col-md-12">
        <div class="box box-solid box-warning">
          <div class="box-header">
            <i class="fa fa-truck"></i>
            <h3 class="box-title">Kendaraan</h3>
          </div>
          <div class="box-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Kendaraan</th>
                  <th>Nomor Polisi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kendaraans as $key => $kendaraan)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                    <td>{{ $kendaraan->no_polisi }}</td>
                    <td>{{ $kendaraan->kendaraanDetails->count() ? $status[$kendaraan->lastStatus()->status] : 'Belum Ada' }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
  </section>

@endsection

@section('scripts')
  <script>
    $(function () {
      $('#calendar').datepicker({
        "setDate": new Date(),
        "autoclose": true,
        "todayBtn": true,
        "todayHighlight": true
      })
    })
</script>
@endsection
