<!-- Id Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('id', 'Id:') !!}
  </div>
  <div class="col-sm-9">
    {!! $kendaraan->id !!}
  </div>
</div>

<!-- Jenis Kendaraan Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('jenis_kendaraan', 'Jenis Kendaraan:') !!}
  </div>
  <div class="col-sm-9">
    {!! $kendaraan->jenis_kendaraan !!}
  </div>
</div>

<!-- No Polisi Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('no_polisi', 'No Polisi:') !!}
  </div>
  <div class="col-sm-9">
    {!! $kendaraan->no_polisi !!}
  </div>
</div>

<!-- No Polisi Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('masa_pajak', 'Masa Berlaku Pajak:') !!}
  </div>
  <div class="col-sm-9">
    {!! $kendaraan->masa_pajak->format('d F Y') !!}
  </div>
</div>

<!-- No Polisi Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('masa_stnk', 'Masa Berlaku STNK:') !!}
  </div>
  <div class="col-sm-9">
    {!! $kendaraan->masa_stnk->format('d F Y') !!}
  </div>
</div>

<!-- No Polisi Field -->
<div class="form-group col-sm-12">
    <div class="col-sm-3">
    {!! Form::label('masa_kir', 'Masa Berlaku KIR:') !!}
  </div>
  <div class="col-sm-9">
    {!! $kendaraan->masa_kir->format('d F Y') !!}
  </div>
</div>
