<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bahanBakuHistory->id !!}</p>
</div>

<!-- Material Id Field -->
<div class="form-group">
    {!! Form::label('bahan_baku_id', 'Material:') !!}
    <p>{!! $bahanBakuHistory->bahan_baku->nama_bahan_baku !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $bahanBakuHistory->type !!}</p>
</div>

<!-- Pengadaan Id Field -->
<div class="form-group">
    {!! Form::label('pengadaan_id', 'Pengadaan Id:') !!}
    <p>{!! $bahanBakuHistory->pengadaan_id !!}</p>
</div>

<!-- Produksi Id Field -->
<div class="form-group">
    {!! Form::label('produksi_id', 'Produksi Id:') !!}
    <p>{!! $bahanBakuHistory->produksi_id !!}</p>
</div>

<!-- Material Keluar Id Field -->
<div class="form-group">
    {!! Form::label('opname_id', 'Material Keluar Id:') !!}
    <p>{!! $bahanBakuHistory->opname_id !!}</p>
</div>

<!-- Total Sisa Field -->
<div class="form-group">
    {!! Form::label('total_sisa', 'Total Sisa:') !!}
    <p>{!! $bahanBakuHistory->total_sisa !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bahanBakuHistory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bahanBakuHistory->updated_at !!}</p>
</div>
