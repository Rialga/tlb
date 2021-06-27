@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penerimaan Material <small>Show</small>
        </h1>
    </section>
    <div class="content">
      <div class="box box-solid box-primary">
        <div class="box-header">
          <h3 class="box-title">Detail Penerimaan Material</h3>
        </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pemesanan_bahan_bakus.pengadaans.show_fields')
                    <a href="{!! route('supplier.pengadaans.index', $supplier) !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
