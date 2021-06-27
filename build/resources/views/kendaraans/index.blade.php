@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Kendaaran</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('kendaraans.create') !!}">Tambah Baru</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Rekapitulasi Kendaraan</h3>
          </div>
            <div class="box-body">
                <div class="table-responsive">
                  @include('kendaraans.table')
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
    $('#kendaraans-table').DataTable();
  });
</script>
@endsection
