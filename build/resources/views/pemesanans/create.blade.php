@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemesanan <small>Tambah</small>
        </h1>
    </section>
    <div class="content">
      <div class="clearfix"></div>

      @include('flash::message')

      <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Pemesanan</h3>
          </div>

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pemesanans.store']) !!}

                        @include('pemesanans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
