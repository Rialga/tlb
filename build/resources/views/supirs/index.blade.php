@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Supir</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#filter"><i class="fa fa-filter"></i> Filter</button>
        <br><br>
        <div id="filter" class="collapse">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <h3 class="box-title">Filter</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'filterHistorySupir']) !!}

                    <div class="form-group col-sm-12">
                        {!! Form::label('', 'Rentang Tanggal:') !!}
                        <div class="">
                            <div class="col-sm-6">
                                {!! Form::date('tanggal_kirim_dari', null, ['class' => 'form-control', 'placeholder' => 'Dari']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::date('tanggal_kirim_sampai', null, ['class' => 'form-control', 'placeholder' => 'Sampai']) !!}
                            </div>
                        </div>
                    </div>

                    @php
                        $supir = App\Models\Supir::pluck('nama_supir', 'id');
                    @endphp
                    <div class="form-group col-sm-6">
                            {!! Form::label('supir', 'Supir:') !!}
                        {!! Form::select('supir', $supir, null, ['class' => 'form-control', 'placeholder' => '- Pilih Nama Supir -'])!!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">History Supir</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table" id="supir-hostory">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Supir</th>
                            <th>Kubikasi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Kerja</th>
                            <th>Jam Kerja</th>
                            <th>Shift Kerja</th>
                            <th>Nama Pemesan</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach($data as $datas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$datas->supir->nama_supir}}</td>
                                <td>{!! $datas->volume !!} m<sup>3</sup></td>
                                <td>{!! $datas->pemesanan->lokasi_proyek !!}</td>
                                <td>{!! Carbon\Carbon::parse($datas->waktu_produksi)->format('d/m/Y') !!}</td>
                                <td>{!! Carbon\Carbon::parse($datas->waktu_produksi)->format('H:i') !!} WIB</td>
                                <td>Shift {!! $datas->shift !!} </td>
                                <td>{!! $datas->pemesanan->nama_pemesanan !!}</td>

                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">List Supir</h3>
          </div>
            <div class="box-body">
              <div class="table-responsive">
                  <h1 class="pull-left">
                      <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('supirs.create') !!}">Tambah Baru</a>
                  </h1>

                @include('supirs.table')
              </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#supirs-table').DataTable();
  });

  $(document).ready(function() {
      $('#supir-hostory').DataTable({

          dom: 'Bfrtip',
          buttons: [
              {
                  extend: 'excelHtml5',
                  title: 'Histori data Supir',
              },

          ],

          scrollCollapse: true,
          paging: false,
      });
  });

</script>
@endsection
