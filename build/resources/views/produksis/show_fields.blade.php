<!-- Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('id', 'ID') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->id !!}</p>
  </div>
</div>

<!-- Nomor Dokumen Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('nomor_dokumen', 'Nomor Dokumen') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->nomor_dokumen !!}</p>
  </div>
</div>

<!-- Pemesanan Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('pemesanan_id', 'Nama Pemesanan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->pemesanan->nama_pemesanan !!}</p>
  </div>
</div>

<!-- Nama Pengirim Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('nama_pengirim', 'Nama Pengirim') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->nama_pengirim !!}</p>
  </div>
</div>

<!-- Nama Penerima Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('nama_penerima', 'Nama Penerima') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->nama_penerima !!}</p>
  </div>
</div>

<!-- Volume Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('volume', 'Volume') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! number_format($produksi->volume,2,",",".") !!} m³</p>
  </div>
</div>

<!-- Produk Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('produk_id', 'Produk') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->produk ? $produksi->produk->mutu_produk : null !!}</p>
  </div>
</div>

<!-- Waktu Produksi Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('waktu_produksi', 'Tanggal Pengiriman') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->waktu_produksi !!} (Shift {!! $produksi->shift !!})</p>
  </div>
</div>

<!-- Supir Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('supir_id', 'Supir') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->supir->nama_supir !!}</p>
  </div>
</div>

<!-- No Kendaraan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('no_polisi', 'Nomor Polisi') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->kendaraan->no_polisi !!}</p>
  </div>
</div>

@php
  $status = [
    'Sedang Produksi',
    'Sedang Dikirim',
    'Terkirim'
  ];
@endphp

<!-- User Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('user_id', 'Pegawai') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->user->name !!}</p>
  </div>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('created_at', 'Created At') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->created_at !!}</p>
  </div>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('updated_at', 'Updated At') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produksi->updated_at !!}</p>
  </div>
</div>
