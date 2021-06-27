<table class="table table-responsive" id="kendaraans-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenis Kendaraan</th>
            <th>No Polisi</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
    @foreach($kendaraans as $kendaraan)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{!! $kendaraan->jenis_kendaraan !!}</td>
            <td>{!! $kendaraan->no_polisi !!}</td>
            <td><a href="{{ route('kendaraans.kendaraanDetails.index', $kendaraan->id) }}" class="btn btn-success">{{ $kendaraan->kendaraanDetails->count() ? $status[$kendaraan->lastStatus()->status] : 'Belum Ada' }}</a></td>
            <td>
                {!! Form::open(['route' => ['kendaraans.destroy', $kendaraan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kendaraans.show', [$kendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kendaraans.edit', [$kendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
