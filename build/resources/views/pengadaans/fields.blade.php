<!-- Nomor Dokumen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nomor_dokumen', 'Nomor Dokumen:') !!}
    {!! Form::text('nomor_dokumen', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Penerima Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_penerima', 'Nama Penerima:') !!}
    {!! Form::text('nama_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Pengirim Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_pengirim', 'Nama Pengirim:') !!}
    {!! Form::text('nama_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Field -->
<div class="form-group col-sm-12">
    {!! Form::label('pemesanan_bahan_baku_id', 'Supplier:') !!}
    {!! Form::select('pemesanan_bahan_baku_id', $supplier, null, ['class' => 'form-control', 'id' => 'supplier', 'placeholder' => 'Pilih Supplier..', 'id'=> 'material']) !!}
</div>

<!-- Berat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('berat', 'Kuantitas:', ['id'=>'material_label']) !!}
    {!! Form::number('berat', null, ['class' => 'form-control numb', 'step' => 'any']) !!}
</div>

<!-- Supir Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supir', 'No Polisi:') !!}
    {!! Form::text('supir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pengadaan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal_pengadaan', 'Tanggal Penerimaan:') !!}
    {!! Form::text('tanggal_pengadaan', null, ['class' => 'form-control datetimepicker'] ) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pengadaans.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    
    $('#material').change(function (e){
        var id = $('#material option:selected').val();
        var url = "{{ url('api/supplier')}}";
        
        if(id){
            $.getJSON(url+'/'+id, function(data) {
                $('#material_label').text('');
                var label = 'Kuantitas ('+data.satuan+'):';
                $('#material_label').text(label);
            });
        }else{
            $('#material_label').text('Kuantitas:');
        }
    })
</script>
@endsection
