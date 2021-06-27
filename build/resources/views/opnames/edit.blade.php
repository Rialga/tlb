@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Material Keluar <small>Edit</small>
        </h1>
   </section>
   <div class="content">
     <div class="clearfix"></div>

     @include('flash::message')

     <div class="clearfix"></div>
       @include('adminlte-templates::common.errors')
       <div class="box box-solid box-primary">
         <div class="box-header">
           <h3 class="box-title">Form Edit Material Keluar</h3>
         </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($opname, ['route' => ['opnames.update', $opname->id], 'method' => 'patch']) !!}

                        @include('opnames.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
