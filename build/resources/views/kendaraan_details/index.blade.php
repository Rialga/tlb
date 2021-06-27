@extends('layouts.app')

@section('content')
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
              {!! Form::open(['route' => ['filterStatusKendaraan', $kendaraan]]) !!}
                  @include('kendaraan_details.filter_fields')
              {!! Form::close() !!}
            </div>
          </div>
        </div>

        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Rekapitulasi Status Kendaraan <strong>{{ $kendaraan->jenis_kendaraan }} ({{ $kendaraan->no_polisi }})</strong></h3>
          </div>
            <div class="box-body">
              <div class="table-responsive">
                <h1 class="pull-left" style="margin-right:10px;">
                   <a class="btn btn-default pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('kendaraans.index') !!}">List Kendaraan</a>
                </h1>
                <h1 class="pull-left" style="margin-right:10px;">
                      {!! Form::open(['route' => ['downloadStatusKendaraan', $kendaraan ], 'target' => '_blank'])!!}
                      {!! Form::hidden('kendaraanDetails', $kendaraanDetails) !!}
                      {!! Form::button('<i class="fa fa-file-pdf-o"></i> PDF', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                      {!! Form::close() !!}
                </h1>
                <h1 class="pull-left clearfix">
                      {!! Form::open(['route' => ['downloadStatusExcel', $kendaraan] , 'target' => '_blank'])!!}
                      {!! Form::hidden('kendaraanDetails', $kendaraanDetails) !!}
                      {!! Form::button('<i class="fa fa-file-excel-o"></i> Excel', ['class' => 'btn btn-success pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                      {!! Form::close() !!}
                </h1>
                <h1 class="pull-right">
                  <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#perbarui">
                    Perbarui
                  </button>
                </h1>
                @include('kendaraan_details.table')
              </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="perbarui" tabindex="-1" role="dialog" aria-labelledby="perbaruiStatus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      {!! Form::open(['route' => ['kendaraans.kendaraanDetails.store', $kendaraan]]) !!}
      <div class="modal-body">
        <div class="content">
            @include('adminlte-templates::common.errors')
            <div class="box box-solid box-primary">
              <div class="box-header">
                <h3 class="box-title">Perbarui Status Kendaraan</h3>
              </div>

                <div class="box-body">
                    <div class="row">
                      @include('kendaraan_details.fields')
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $(function () {
        $('#calendar').datetimepicker({
          // locale : 'id'
          format: "YYYY-MM-DD HH:mm:ss"
        });
    });
    $('#kendaraanDetails-table').DataTable();
  });
</script>
@endsection
