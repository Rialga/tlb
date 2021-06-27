<!-- Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produk_id', 'Produk Id:') !!}
    {!! Form::text('produk_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Material Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bahan_baku_id', 'Material Id:') !!}
    {!! Form::text('bahan_baku_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volume', 'Volume:') !!}
    {!! Form::number('volume', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('komposisiMutus.index') !!}" class="btn btn-default">Cancel</a>
</div>
