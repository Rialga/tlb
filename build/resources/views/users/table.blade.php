<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
          <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
      @endphp
    @foreach($users as $user)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->jabatan->nama_jabatan !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
