@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Produk <small>Edit {{ $produk->mutu_produk }}</small>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-solid box-primary">
         <div class="box-header">
           <h3 class="box-title">Form Edit Produk</h3>
         </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($produk, ['route' => ['produks.update', $produk->id], 'method' => 'patch']) !!}

                        @include('produks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
