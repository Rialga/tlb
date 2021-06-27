<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bahanBaku->id !!}</p>
</div>

<!-- Nama Material Field -->
<div class="form-group">
    {!! Form::label('nama_bahan_baku', 'Nama Material:') !!}
    <p>{!! $bahanBaku->nama_bahan_baku !!}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{!! $bahanBaku->satuan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bahanBaku->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bahanBaku->updated_at !!}</p>
</div>

