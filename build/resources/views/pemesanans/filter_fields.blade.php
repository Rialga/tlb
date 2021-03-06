
<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('', 'Pengiriman:') !!}
    <div class="">
      <div class="col-sm-3">
        {!! Form::date('tanggal_kirim_dari', null, ['class' => 'form-control', 'placeholder' => 'Dari']) !!}
      </div>
      <div class="col-sm-3">
        {!! Form::date('tanggal_kirim_sampai', null, ['class' => 'form-control', 'placeholder' => 'Sampai']) !!}
      </div>
    </div>
</div>
<div class="form-group col-sm-6">
  {!! Form::label('jenis_pesanan', 'Jenis:') !!}
  {!! Form::select('jenis_pesanan', ['Retail', 'Non Retail'], null, ['class' => 'form-control', 'placeholder' => '- Pilih Jenis -'])!!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
</div>
