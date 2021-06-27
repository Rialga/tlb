<!-- Mutu Produk Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mutu_produk', 'Mutu Produk:') !!}
    {!! Form::text('mutu_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
    <hr>
</div>
<div class="form-group col-sm-12">
  {!! Form::label(null, 'Volume Material per Kg/m3 :') !!}
  <br>
</div>

@foreach ($bahan_bakus as $key => $bahan_baku)
  @php
    $field = $bahan_baku->kode;
  @endphp
  <div class="form-group col-sm-3">
      {!! Form::label($field, $bahan_baku->nama_bahan_baku.':') !!}
      {!! Form::number($field, isset($produk) ? $produk->bahan($bahan_baku->kode) ? $produk->bahan($bahan_baku->kode)->volume : 0 : 0, ['class' => 'form-control numb', 'step' => 'any']) !!}
  </div>
@endforeach
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produks.index') !!}" class="btn btn-default">Cancel</a>
</div>
