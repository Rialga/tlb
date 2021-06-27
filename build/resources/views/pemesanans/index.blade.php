@extends('layouts.app') @section('content')
<section class="content-header">
  <h1 class="pull-left">Pemesanan</h1>
  <br>
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
        {!! Form::open(['route' => 'pemesanans.filter']) !!}

            @include('pemesanans.filter_fields')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="box box-solid box-primary">
    <div class="box-header">
      <h3 class="box-title">Rekapitulasi Pemesanan</h3>
    </div>
    <div class="box-body">

      @if (Auth::user()->is('marketing') || Auth::user()->is('manager_produksi') || Auth::user()->is('admin'))
        <h1 class="pull-left" style="margin-right:10px;">
              {!! Form::open(['route' => 'downloadPdf' , 'target' => '_blank'])!!}
              {!! Form::hidden('pemesanans', $pemesanans) !!}
              {!! Form::button('<i class="fa fa-file-pdf-o"></i> PDF', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
              {!! Form::close() !!}
        </h1>

        <h1 class="pull-left clearfix">
              {!! Form::open(['route' => 'downloadExcel'])!!}
              {!! Form::hidden('pemesanans', $pemesanans) !!}
              {!! Form::button('<i class="fa fa-file-excel-o"></i> Excel', ['class' => 'btn btn-success pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
              {!! Form::close() !!}
        </h1>

        <h1 class="pull-right">
                 <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pemesanans.create') !!}">Tambah Baru</a>
        </h1>
            <br><br><hr>
      @endif

      @include('pemesanans.table')

    </div>
  </div>
  <div class="text-center">

  </div>
</div>
@endsection @section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#pemesanans-table').DataTable();
    // Apply the search
    table.columns().every(function() {
      var that = this;

      $('input', this.footer()).on('keyup change', function() {
        if (that.search() !== this.value) {
          that
            .search(this.value)
            .draw();
        }
      });
    });
  });
</script>
@endsection
