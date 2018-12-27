<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
        </tr>
    </thead>
    <tbody>
    @php $currentUser = auth()->user()->id; @endphp
        @foreach($users as $user)

            <tr>
                <td>
                {!! Form::open([
                    'method' => 'DELETE',
                    'route'  => ['backend.users.destroy', $user->id]
                ]) !!}
                    <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    @if($user->id == config('cms.default_user_id') || $user->id == $currentUser)
                    <button onclick="return false" typr="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                    @else
                    <a href="{{ route('backend.users.confirm', $user->id) }}" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                    @endif
                   
                    {!! Form::close() !!}
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->first()->display_name }}</td>
            </tr>

        @endforeach
    </tbody>
</table>