<!-- Supplier Field -->
<div class="form-group col-sm-12">
    {!! Form::label('jenis_kendaraan', 'Jenis Kendaraan:') !!}
    {!! Form::text('jenis_kendaraan', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Field -->
<div class="form-group col-sm-12">
    {!! Form::label('no_polisi', 'No Polisi') !!}
    {!! Form::text('no_polisi', null, ['class' => 'form-control']) !!}
</div>

<!-- Masa Pajak Field -->
<div class="form-group col-sm-12">
    {!! Form::label('masa_pajak', 'Masa Berlaku Pajak:') !!}
    {!! Form::text('masa_pajak', null, ['class' => 'form-control datetimepicker']) !!}
</div>

<!-- Masa STNK Field -->
<div class="form-group col-sm-12">
    {!! Form::label('masa_stnk', 'Masa Berlaku STNK:') !!}
    {!! Form::text('masa_stnk', null, ['class' => 'form-control datetimepicker']) !!}
</div>

<!-- Masa KIR Field -->
<div class="form-group col-sm-12">
    {!! Form::label('masa_kir', 'Masa Berlaku KIR:') !!}
    {!! Form::text('masa_kir', null, ['class' => 'form-control datetimepicker']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kendaraans.index') !!}" class="btn btn-default">Cancel</a>
</div>
