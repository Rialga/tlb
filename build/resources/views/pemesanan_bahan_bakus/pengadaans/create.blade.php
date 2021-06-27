@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penerimaan Material <strong>{{ $supplier->bahan_baku->nama_bahan_baku }} ({{ $supplier->nama_supplier }})</strong> <small>Tambah</small>
        </h1>
    </section>
    <div class="content">
       <div class="clearfix"></div>

       @include('flash::message')

       <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Penerimaan Material</h3>
          </div>

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['supplier.pengadaans.store', $supplier]]) !!}

                        @include('pemesanan_bahan_bakus.pengadaans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
