@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Produksi
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
                   {!! Form::model($produksi, ['route' => ['pemesanans.produksis.update', $pemesanan, $produksi->id], 'method' => 'patch']) !!}

                        @include('pemesanans.produksis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
