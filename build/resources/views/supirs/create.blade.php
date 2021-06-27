@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Supir <small>Tambah</small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-solid box-primary" >
          <div class="box-header">
            <h3 class="box-title">Form Tambah Supir</h3>
          </div>

            <div class="box-body ">
                <div class="row">
                    {!! Form::open(['route' => 'supirs.store']) !!}

                        @include('supirs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
