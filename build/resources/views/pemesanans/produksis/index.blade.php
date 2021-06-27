@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Produksi Pemesanan <strong>{{ $pemesanan->nama_pemesanan }}</strong></h1>
        @if (Auth::user()->is('produksi') || Auth::user()->is('manager_produksi') || Auth::user()->is('admin'))
          <h1 class="pull-right">
             <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pemesanans.produksis.create', $pemesanan) !!}">Tambah Baru</a>
          </h1>
        @endif
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <br>
        <div class="clearfix"></div>
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#filter"><i class="fa fa-filter"></i> Filter</button>
        <div class="clearfix"></div><br>
        <div id="filter" class="collapse">
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">

              {!! Form::open(['route' => ['pemesanans.produksis.filter', $pemesanan]]) !!}

                  @include('pemesanans.produksis.filter_fields')

              {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix">

        </div>
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Rekapitulasi Produksi Pemesanan <strong>{{ $pemesanan->nama_pemesanan }}</strong></h3>
          </div>
            <div class="box-body">
              <div class="table-responsive">
                @if (Auth::user()->is('produksi') || Auth::user()->is('manager_produksi') || Auth::user()->is('admin') || Auth::user()->is('marketing'))
                  <h1 class="pull-left" style="margin-right:10px;">
                        {!! Form::open(['route' => 'downloadPengiriman' , 'target' => '_blank'])!!}
                        {!! Form::hidden('pemesanans', $pemesanan) !!}
                        {!! Form::button('<i class="fa fa-file-pdf-o"></i> PDF', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                  </h1>

                  <h1 class="pull-left clearfix">

                        {!! Form::open(['route' => 'exportProduksiPemesanan'])!!}
                        {!! Form::hidden('pemesanans', $pemesanan) !!}
                        {!! Form::hidden('id', $pemesanan->id) !!}
                        {!! Form::button('<i class="fa fa-file-excel-o"></i> Excel', ['class' => 'btn btn-success pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                  </h1>
                @endif

                @include('pemesanans.produksis.table')
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
      setTimeout(function(){
        $('#produksis-table').DataTable();
        $('.status').on('change', function() {
          $(this.form).trigger('submit')
        });
      }, 1000);
    });
  </script>
@endsection
