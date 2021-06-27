@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kendaraan <small>Tambah</small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Kendaraan</h3>
          </div>

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'kendaraans.store']) !!}

                        @include('kendaraans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
