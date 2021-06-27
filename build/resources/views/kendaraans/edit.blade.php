@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kendaraan <small>Edit</small>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-solid box-primary">
         <div class="box-header">
           <h3 class="box-title">Form Edit Kendaraan</h3>
         </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kendaraan, ['route' => ['kendaraans.update', $kendaraan->id], 'method' => 'patch']) !!}

                        @include('kendaraans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
