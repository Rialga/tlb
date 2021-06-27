@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tambah Produksi untuk <strong>{{ $pemesanan->nama_pemesanan }}</strong>
        </h1>
    </section>
    <div class="content">
      <div class="clearfix"></div>

      @include('flash::message')

      <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['pemesanans.produksis.store', $pemesanan]]) !!}

                        @include('pemesanans.produksis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
