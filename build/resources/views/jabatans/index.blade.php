@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Jabatan</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">List Jabatan</h3>
          </div>
            <div class="box-body">
              <div class="table-responsive">
                    @include('jabatans.table')
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
    $('#jabatans-table').DataTable();

  });
</script>
@endsection
