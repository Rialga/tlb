@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Histori Material
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bahanBakuHistory, ['route' => ['bahanBakuHistories.update', $bahanBakuHistory->id], 'method' => 'patch']) !!}

                        @include('bahan_baku_histories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
