<!-- Material Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bahan_baku_id', 'Material Id:') !!}
    {!! Form::text('bahan_baku_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::number('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Pengadaan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengadaan_id', 'Pengadaan Id:') !!}
    {!! Form::text('pengadaan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Produksi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produksi_id', 'Produksi Id:') !!}
    {!! Form::text('produksi_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Material Keluar Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opname_id', 'Material Keluar Id:') !!}
    {!! Form::text('opname_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Sisa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_sisa', 'Total Sisa:') !!}
    {!! Form::number('total_sisa', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bahanBakuHistories.index') !!}" class="btn btn-default">Cancel</a>
</div>
