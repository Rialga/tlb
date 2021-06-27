<!-- Nama Supplier Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('nama_supplier', 'Nama Supplier') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->nama_supplier  !!}
  </div>
</div>

<!-- Cp Supplier Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('cp_supplier', 'CP Supplier') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->cp_supplier  !!}
  </div>
</div>

<!-- Material Id Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('bahan_baku_id', 'Material') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->bahan_baku->nama_bahan_baku  !!}
  </div>
</div>

<!-- Volume Pemesanan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('volume_pemesanan', 'Kuantitas Pemesanan') !!}
  </div>
  <div class="col-sm-9">
    {!!number_format($pemesananBahanBaku->volume_pemesanan,2,",",".") !!} {!! $pemesananBahanBaku->bahan_baku->satuan !!}
  </div>
</div>

<!-- Tanggal Pemesanan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('tanggal_pemesanan', 'Tangal Pemesanan') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->tanggal_pemesanan  !!}
  </div>
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('keterangan', 'Keterangan') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->keterangan  !!}
  </div>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('user', 'Pegawai') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->user->name  !!}
  </div>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('created_at', 'Created At') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->created_at  !!}
  </div>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-12">
  <div class="col-sm-3">
    {!! Form::label('updated_at', 'Updated At') !!}
  </div>
  <div class="col-sm-9">
    {!!$pemesananBahanBaku->updated_at  !!}
  </div>
</div>
