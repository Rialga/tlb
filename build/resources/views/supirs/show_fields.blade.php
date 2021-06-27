<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $supir->id !!}</p>
</div>

<!-- No Supir Field -->
<div class="form-group">
    {!! Form::label('no_supir', 'No Supir:') !!}
    <p>{!! $supir->no_supir !!}</p>
</div>

<!-- Nama Supir Field -->
<div class="form-group">
    {!! Form::label('nama_supir', 'Nama Supir:') !!}
    <p>{!! $supir->nama_supir !!}</p>
</div>

<!-- No SIM Field -->
<div class="form-group">
    {!! Form::label('no_sim', 'Nomor SIM:') !!}
    <p>{!! $supir->no_sim !!}</p>
</div>

<!-- Expired SIM Field -->
<div class="form-group">
    {!! Form::label('expired_sim', 'Masa Berlaku SIM hingga:') !!}
    <p>{!! Carbon\Carbon::parse($supir->expired_sim)->format(' d M Y')  !!}</p>
</div>
