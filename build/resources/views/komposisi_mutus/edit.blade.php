@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Komposisi Mutu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($komposisiMutu, ['route' => ['komposisiMutus.update', $komposisiMutu->id], 'method' => 'patch']) !!}

                        @include('komposisi_mutus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection