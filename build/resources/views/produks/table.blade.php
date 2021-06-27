<table class="table table-responsive" id="produks-table">
    <thead>
        <tr>
          <th>#</th>
            <th>Mutu Produk</th>
        <th>Satuan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
      @endphp
    @foreach($produks as $produk)
        <tr>
          <td>{{ $no++ }}</td>
            <td>{!! $produk->mutu_produk !!}</td>
            <td>{!! $produk->satuan !!}</td>
            <td>
                {!! Form::open(['route' => ['produks.destroy', $produk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produks.show', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('produks.edit', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
