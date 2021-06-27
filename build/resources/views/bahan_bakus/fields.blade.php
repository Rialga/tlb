<!-- Nama Material Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_bahan_baku', 'Nama Material:') !!}
    {!! Form::text('nama_bahan_baku', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Sisa Field -->
<div class="form-group col-sm-12">
    {!! Form::label('sisa', 'Sisa:') !!}
    {!! Form::number('sisa', null, ['class' => 'form-control numb', 'step' => 'any']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bahanBakus.index') !!}" class="btn btn-default">Cancel</a>
</div>

<script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k == 45 || k == 95);
        }
</script>
