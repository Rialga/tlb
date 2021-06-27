@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Pemesanan Material</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('supplier.create') !!}">Tambah Baru</a>
        </h1>
    </section>
    <br>
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
              {!! Form::open(['route' => 'filterPesanBahanBaku']) !!}
                  @include('pemesanan_bahan_bakus.filter_fields')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Rekapitulasi Pemesanan Material</h3>
          </div>
            <div class="box-body">
              <h1 class="pull-left" style="margin-right:10px;">
                   {!! Form::open(['route' => 'downloadSupplier' , 'target' => '_blank'])!!}
                    {!! Form::hidden('pemesananBahanBakus', $pemesananBahanBakus) !!}
                    {!! Form::button('<i class="fa fa-file-pdf-o"></i> PDF', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                   {!! Form::close() !!}
              </h1>
              <h1 class="pull-left clearfix">
                    {!! Form::open(['route' => 'exportSupplier' , 'target' => '_blank'])!!}
                    {!! Form::hidden('pemesananBahanBakus', $pemesananBahanBakus) !!}
                    {!! Form::button('<i class="fa fa-file-excel-o"></i> Excel', ['class' => 'btn btn-success pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
              </h1>
              <div class="clearfix">

              </div>
              <div class="table-responsive">
                  @include('pemesanan_bahan_bakus.table')
              </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection @section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#pemesananBahanBakus-table').DataTable();
  });
</script>
@endsection
