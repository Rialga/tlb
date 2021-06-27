<!-- Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('id', 'Id') !!}
  </div>
  <div class="col-sm-9">
    {!! $pemesanan->id !!}
  </div>
</div>

<!-- Nomor Dokumen -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('nomor_dokumen', 'Nomor Dokumen') !!}
  </div>
  <div class="col-sm-9">
    {!! $pemesanan->nomor_dokumen !!}
  </div>
</div>

<!-- Nama Pemesana Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('nama_pemesanan', 'Nama Pemesanan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->nama_pemesanan !!}</p>
  </div>
</div>

<!-- Mutu Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('mutu', 'Mutu') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->mutu !!}</p>
  </div>
</div>

<!-- Volume Pesanan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('volume_pesanan', 'Volume Pesanan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! number_format($pemesanan->volume_pesanan,2,",",".") !!} m³</p>
  </div>
</div>

<!-- Tanggal Pesanan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('tanggal_pesanan', 'Tanggal Pesanan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->tanggal_pesanan->format('d F Y (h:i:s)') !!}</p>
  </div>
</div>

<!-- Tanggal Kirim Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('tanggal_kirim', 'Tanggal Kirim') !!}
  </div>
  <div class="col-sm-9">
    <p>
      {!! $pemesanan->tanggal_kirim_dari->format('d F Y (h:i:s)') !!} {!! $pemesanan->tanggal_kirim_sampai ? ' - '.$pemesanan->tanggal_kirim_sampai->format('d F Y (h:i:s)') : '' !!}
    </p>
  </div>
</div>

<!-- Lokasi Proyek Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('lokasi_proyek', 'Lokasi Proyek') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->lokasi_proyek !!}</p>
  </div>
</div>

<!-- Jenis Pesanan Field -->
@php
  $jenis = ['Retail', 'Non Retail'];
@endphp
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('jenis_pesanan', 'Jenis Pesanan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $jenis[$pemesanan->jenis_pesanan] !!}</p>
  </div>
</div>

<!-- Cp Pesanan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('cp_pesanan', 'CP Pesanan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->cp_pesanan !!}</p>
  </div>
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('keterangan', 'Keterangan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->keterangan !!}</p>
  </div>
</div>

<!-- Status Field -->
@php
  $sisa = $pemesanan->volume_pesanan - $pemesanan->produksis->sum('volume');
@endphp
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('status', 'Status') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! ''.number_format($sisa,2,",",".") !!}</p>
  </div>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('user_id', 'Pegawai') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->user->name !!}</p>
  </div>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('created_at', 'Created At') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->created_at !!}</p>
  </div>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('updated_at', 'Updated At') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $pemesanan->updated_at !!}</p>
  </div>
</div>
