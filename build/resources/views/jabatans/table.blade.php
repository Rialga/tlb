<table class="table table-responsive" id="jabatans-table">
    <thead>
        <tr>
          <th>#</th>
            <th>Nama Jabatan</th>
        <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
      $no=1;
      @endphp
    @foreach($jabatans as $jabatan)
        <tr>
          <td>{!! $no++ !!}</td>
            <td>{!! $jabatan->nama_jabatan !!}</td>
            <td>{!! $jabatan->keterangan !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('jabatans.edit', [$jabatan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
