@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Produk <small>Show {{ $produk->mutu_produk }}</small>
        </h1>
    </section>
    <div class="content">
      <div class="box box-solid box-primary">
        <div class="box-header">
          <h3 class="box-title">Detail Produk {{ $produk->mutu_produk }}</h3>
        </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('produks.show_fields')
                    <a href="{!! route('produks.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
