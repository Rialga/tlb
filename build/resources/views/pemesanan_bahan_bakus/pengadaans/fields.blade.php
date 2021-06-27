<!-- Nomor Dokumen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nomor_dokumen', 'Nomor Dokumen:') !!}
    {!! Form::text('nomor_dokumen', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Penerima Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_penerima', 'Nama Penerima:') !!}
    {!! Form::text('nama_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Pengirim Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_pengirim', 'Nama Pengirim:') !!}
    {!! Form::text('nama_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Berat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('berat', 'Kuantitas ('.$supplier->bahan_baku->satuan.'):') !!}
    {!! Form::number('berat', null, ['class' => 'form-control numb', 'step' => 'any']) !!}
</div>


{!! Form::hidden('pemesanan_bahan_baku_id', $supplier->id) !!}

<!-- Supir Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supir', 'No Polisi:') !!}
    {!! Form::text('supir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pengadaan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal_pengadaan', 'Tanggal Penerimaan:') !!}
    {!! Form::text('tanggal_pengadaan', null, ['class' => 'form-control datetimepicker'] ) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('supplier.pengadaans.index', $supplier) !!}" class="btn btn-default">Cancel</a>
</div>
