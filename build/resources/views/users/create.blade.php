@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pegawai <small>Tambah</small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Pegawai</h3>
          </div>

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store']) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
