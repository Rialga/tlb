@extends('layouts.app') @section('content')
<section class="content-header">
  <h1 class="pull-left">Histori Material</h1>
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
        {!! Form::open(['route' => 'filterHistoryBahanBaku']) !!}
            @include('bahan_baku_histories.filter_fields')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="box box-solid box-primary">
    <div class="box-header">
      <h3 class="box-title">List Riwayat</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <h1 class="pull-left" style="margin-right:10px;">
              {!! Form::open(['route' => 'downloadHistoryPdf' , 'target' => '_blank'])!!}
              {!! Form::hidden('bahanBakuHistories', $bahanBakuHistories) !!}
              {{ Form::hidden('dari', @$dari) }}
              {{ Form::hidden('sampai', @$sampai) }}
              {!! Form::button('<i class="fa fa-file-pdf-o"></i> PDF', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
              {!! Form::close() !!}
        </h1>
        <h1 class="pull-left clearfix" style="margin-right:10px;">
              {!! Form::open(['route' => 'downloadHistoryExcel' ])!!}
              {!! Form::hidden('bahanBakuHistories', $bahanBakuHistories) !!}
              {{ Form::hidden('dari', @$dari) }}
              {{ Form::hidden('sampai', @$sampai) }}
              {!! Form::button('<i class="fa fa-file-excel-o"></i> Excel', ['class' => 'btn btn-success pull-left', 'style' => 'margin-top: -10px;margin-bottom: 5px', 'type' => 'submit']) !!}
              {!! Form::close() !!}
        </h1>
        <div class="clearfix"></div>
        @include('bahan_baku_histories.table')
      </div>
    </div>
  </div>
  <div class="text-center">

  </div>
</div>
@endsection @section('scripts')

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#bahanBakuHistories-table').DataTable();
  });
</script>

@endsection
