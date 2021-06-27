<!-- Material Id Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('bahan_baku_id', 'Material:') !!}
  </div>
  <div class="col-sm-9">
    {!! $opname->bahan_baku->nama_bahan_baku !!}
  </div>
</div>

<!-- Volume Material Keluar Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('volume_opname', 'Kuantitas Material Keluar:') !!}
  </div>
  <div class="col-sm-9">
    {!! number_format($opname->volume_opname,2,",",".") !!} {!! $opname->bahan_baku->satuan !!}
  </div>
</div>


<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('keterangan', 'Keterangan:') !!}
  </div>
  <div class="col-sm-9">
    {!! $opname->keterangan !!}
  </div>
</div>


<!-- Tanggal Pemakaian Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('tanggal_pemakaian', 'Tanggal Pemakaian:') !!}
  </div>
  <div class="col-sm-9">
    {!! $opname->tanggal_pemakaian !!}
  </div>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('created_at', 'Created At:') !!}
  </div>
  <div class="col-sm-9">
    {!! $opname->created_at !!}
  </div>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('updated_at', 'Updated At:') !!}
  </div>
  <div class="col-sm-9">
    {!! $opname->updated_at !!}
  </div>
</div>
