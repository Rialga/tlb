@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Produksi <small>Tambah</small>
        </h1>
    </section>
    <div class="content">
      <div class="clearfix"></div>

      @include('flash::message')

      <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Produksi</h3>
          </div>

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'produksis.store']) !!}

                        @include('produksis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
