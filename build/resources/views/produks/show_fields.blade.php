<!-- Id Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('id', 'ID') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produk->id !!}</p>
  </div>
</div>

<!-- Mutu Produk Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('mutu_produk', 'Mutu Produk') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produk->mutu_produk !!}</p>
  </div>
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('satuan', 'Satuan') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produk->id !!}</p>
  </div>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('created_at', 'Created At') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produk->created_at !!}</p>
  </div>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('updated_at', 'Update At') !!}
  </div>
  <div class="col-sm-9">
    <p>{!! $produk->updated_at !!}</p>
  </div>
  <hr><hr>
</div>

<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label(null, 'Komposisi :') !!}
  </div>
  <hr>
</div>

@foreach ($produk->komposisi_mutus as $key => $komposisi)
  <div class="form-group col-sm-12">
      <div class="col-sm-3">
      {!! Form::label(null, $komposisi->bahan_baku->nama_bahan_baku) !!}
    </div>
    <div class="col-sm-9">
      <p>{!! $komposisi->volume !!}</p>
    </div>
  </div>
@endforeach
