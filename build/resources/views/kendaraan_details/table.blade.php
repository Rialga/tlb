<table class="table table-responsive" id="kendaraanDetails-table">
    <thead>
        <tr>
          <th>#</th>
        <th>Status</th>
        <th>Waktu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
    @foreach($kendaraanDetails as $kendaraanDetail)
        <tr>
          <td>{!! $no++ !!}</td>
            <td>{!! $status[$kendaraanDetail->status] !!}</td>
            <td>{!! $kendaraanDetail->waktu->diffForHumans() !!}</td>
            <td>
                {!! Form::open(['route' => ['kendaraans.kendaraanDetails.destroy', $kendaraan, $kendaraanDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kendaraans.kendaraanDetails.show', [$kendaraan, $kendaraanDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
