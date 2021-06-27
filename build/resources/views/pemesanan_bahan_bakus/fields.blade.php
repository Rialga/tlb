<!-- Nama Supplier Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_supplier', 'Nama Supplier:') !!}
    {!! Form::text('nama_supplier', null, ['class' => 'form-control']) !!}
</div>

<!-- Cp Supplier Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cp_supplier', 'CP Supplier:') !!}
    {!! Form::number('cp_supplier', null, ['class' => 'form-control']) !!}
</div>

<!-- Material Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('bahan_baku_id', 'Material:') !!}
    {!! Form::select('bahan_baku_id', $bahanBakus, null, ['class' => 'form-control', 'placeholder' => 'Pilih Material ..', 'id' => 'material']) !!}
</div>

<!-- Volume Pemesanan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('volume_pemesanan', 'Kuantitas Pemesanan:', ['id' => 'material_label']) !!}
    {!! Form::number('volume_pemesanan', null, ['class' => 'form-control numb', 'step' => 'any']) !!}
</div>

<!-- Tanggal Pemesanan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal_pemesanan', 'Tanggal Pemesanan:') !!}
    {!! Form::text('tanggal_pemesanan', null, ['class' => 'form-control datetimepicker']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('supplier.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    
    $('#material').change(function (e){
        var id = $('#material option:selected').val();
        var url = "{{ url('api/bahan_baku')}}";
        
        if(id){
            $.getJSON(url+'/'+id, function(data) {
                $('#material_label').text('');
                var label = 'Kuantitas Pemesanan ('+data.satuan+'):';
                $('#material_label').text(label);
            });
        }else{
            $('#material_label').text('Kuantitas Pemesanan:');
        }
    })
</script>
@endsection
