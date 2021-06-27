<!-- No Supir Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('no_supir', 'No Supir:') !!}
        {!! Form::text('no_supir', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Nama Supir Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('nama_supir', 'Nama Supir:') !!}
        {!! Form::text('nama_supir', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- No SIM Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('no_sim', 'Nomor SIM:') !!}
        {!! Form::number('no_sim', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Nama Supir Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('expired_sim', 'Masa Berlaku SIM:') !!}
        {!! Form::text('expired_sim', null, ['class' => 'form-control datetimepicker']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('supirs.index') !!}" class="btn btn-default">Cancel</a>
</div>
