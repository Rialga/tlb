@extends('layouts.app') @section('content')
<section class="content-header">
  <h1 class="pull-left">Produksi</h1>

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
        <div class="table-responsive">
        {!! Form::open(['route' => 'produksis.filter']) !!}

            @include('produksis.filter_fields')

        {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="box box-solid box-primary">
    <div class="box-header">
      <h3 class="box-title">Rekapitulasi Produksi</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        @if (Auth::user()->is('marketing') ||Auth::user()->is('produksi') || Auth::user()->is('manager_produksi') || Auth::user()->is('admin'))
          <h1 class="pull-left" style="margin-right:10px;">
                {!! Form::open(['route' => 'downloadProduksiPdf' , 'target' => '_blank'])!!}
                {!! Form::hidden('produksis', $produksis) !!}
                {!! Form::button('<i class="fa fa-file-pdf-o"></i> PDF', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                {!! Form::close() !!}
          </h1>
          <h1 class="pull-left clearfix">
                {!! Form::open(['route' => 'exportProduksi' ])!!}
                {!! Form::hidden('produksis', $produksis) !!}
                {!! Form::button('<i class="fa fa-file-excel-o"></i> Excel', ['class' => 'btn btn-success pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
                {!! Form::close() !!}
          </h1>
          @if (!Auth::user()->is('marketing'))
            <h1 class="pull-right">
                     <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('produksis.create') !!}">Tambah Baru</a>
            </h1>
          @endif

              <br><br><hr>
        @endif

        @include('produksis.table')

      </div>
    </div>
  </div>
  <div class="text-center">

  </div>
</div>
@endsection @section('scripts')
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
