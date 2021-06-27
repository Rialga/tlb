
<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('', 'Rentang Tanggal:') !!}
    <div class="">
      <div class="col-sm-6">
        {!! Form::date('tanggal_kirim_dari', null, ['class' => 'form-control', 'placeholder' => 'Dari']) !!}
      </div>
      <div class="col-sm-6">
        {!! Form::date('tanggal_kirim_sampai', null, ['class' => 'form-control', 'placeholder' => 'Sampai']) !!}
      </div>
    </div>
</div>

  @php
    $bahanBakus = App\Models\BahanBaku::pluck('nama_bahan_baku', 'id');
  @endphp
<div class="form-group col-sm-6">
  {!! Form::label('bahan_baku', 'Material:') !!}
  {!! Form::select('bahan_baku', $bahanBakus, null, ['class' => 'form-control', 'placeholder' => '- Pilih Material -'])!!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
</div>
