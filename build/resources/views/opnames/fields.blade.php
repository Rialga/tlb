<!-- Material Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('bahan_baku_id', 'Material:') !!}
    {!! Form::select('bahan_baku_id', $bahanBakus, null, ['class' => 'form-control', 'placeholder' => '-Pilih Material-', 'id' => 'material']) !!}
</div>

<!-- Volume Material Keluar Field -->
<div class="form-group col-sm-12">
    {!! Form::label('volume_opname', 'Kuantitas Material Keluar:', ['id' => 'material_label']) !!}
    {!! Form::number('volume_opname', null, ['class' => 'form-control numb', 'step' => 'any']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pemakaian Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal_pemakaian', 'Tanggal Pemakaian:') !!}
    {!! Form::text('tanggal_pemakaian', null, ['class' => 'form-control datetimepicker']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('opnames.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    
    $('#material').change(function (e){
        var id = $('#material option:selected').val();
        var url = "{{ url('api/bahan_baku')}}";
        
        if(id){
            $.getJSON(url+'/'+id, function(data) {
                $('#material_label').text('');
                var label = 'Kuantitas Material Keluar ('+data.satuan+'):';
                $('#material_label').text(label);
            });
        }else{
            $('#material_label').text('Kuantitas Material Keluar:');
        }
    })
</script>
@endsection
