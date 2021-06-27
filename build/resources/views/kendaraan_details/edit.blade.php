@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Status Kendaraan <strong>{{ $kendaraan->jenis_kendaraan }} ({{ $kendaraan->no_polisi }})</strong>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-solid box-primary">
         <div class="box-header">
           <h3 class="box-title">Form Edit Status Kendaraan</h3>
         </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kendaraanDetail, ['route' => ['kendaraans.kendaraanDetails.update', $kendaraan, $kendaraanDetail->id], 'method' => 'patch']) !!}

                        @include('kendaraan_details.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
