@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemesanan Material <small>Show</small>
        </h1>
    </section>
    <div class="content">
      <div class="box box-solid box-primary">
        <div class="box-header">
          <h3 class="box-title">Detail Pemesanan Material</h3>
        </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pemesanan_bahan_bakus.show_fields')
                    <a href="{!! route('supplier.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
