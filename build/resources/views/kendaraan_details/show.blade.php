@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Kendaraan {{ $kendaraan->jenis_kendaraan }} ({{ $kendaraan->no_polisi }})
        </h1>
    </section>
    <div class="content">
      <div class="box box-solid box-primary">
        <div class="box-header">
          <h3 class="box-title">Detail Status Kendaraan</h3>
        </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('kendaraan_details.show_fields')
                    <a href="{!! route('kendaraans.kendaraanDetails.index', $kendaraan) !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
