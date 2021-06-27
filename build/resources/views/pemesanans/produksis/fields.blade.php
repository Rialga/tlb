
{!! Form::hidden('pemesanan_id', $pemesanan->id) !!}

<!-- Nomor Dokumen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nomor_dokumen', 'Nomor Dokumen:') !!}
    {!! Form::text('nomor_dokumen', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Pengirim Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_pengirim', 'Nama Pengirim:') !!}
    {!! Form::text('nama_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Penerima Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_penerima', 'Nama Penerima:') !!}
    {!! Form::text('nama_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Volume Field -->
<div class="form-group col-sm-7">
    {!! Form::label('volume', 'Volume (m³):') !!}
    {!! Form::number('volume', null, ['class' => 'form-control numb', 'step' => 'any']) !!}
</div>

<!-- Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produk_id', 'Mutu ('.$pemesanan->mutu.'):') !!}
    {!! Form::select('produk_id', $produks , null, ['class' => 'form-control', 'placeholder' => '-Pilih Mutu-']) !!}
</div>

<!-- Waktu Produksi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('waktu_produksi', 'Tanggal Pengiriman:') !!}
    {!! Form::text('waktu_produksi', null, ['class' => 'form-control datetimepicker'])!!}
</div>

<!-- Supir Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supir_id', 'Supir') !!}
    {!! Form::select('supir_id', $supirs , null, ['class' => 'form-control', 'placeholder' => 'Pilih Supir']) !!}
</div>
<!-- No Kendaraan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kendaraan', 'Kendaraan') !!}
    {!! Form::select('kendaraan_id', $kendaraans, null, ['class' => 'form-control', 'placeholder' => 'Pilih Kendaraan']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pemesanans.produksis.index', $pemesanan) !!}" class="btn btn-default">Cancel</a>
</div>
