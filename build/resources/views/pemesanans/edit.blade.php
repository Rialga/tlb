@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemesanan <small>Edit {{ $pemesanan->nama_pemesanan }}</small>
        </h1>
   </section>
   <div class="content">
     <div class="clearfix"></div>

     @include('flash::message')

     <div class="clearfix"></div>
       @include('adminlte-templates::common.errors')
       <div class="box box-solid box-primary">
         <div class="box-header">
           <h3 class="box-title">Form Edit Pemesanan {{ $pemesanan->nama_pemesanan }}</h3>
         </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pemesanan, ['route' => ['pemesanans.update', $pemesanan->id], 'method' => 'patch']) !!}

                        @include('pemesanans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
