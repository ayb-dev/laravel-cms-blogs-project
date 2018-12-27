<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Title</td>
            <td width="120">Author</td>
            <td width="150">Category</td>
            <td width="170">Date</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)

            <tr>
                <td>
                    {!! Form::open([
                        'method' => 'PUT',
                        'route'  => ['backend.blog.restore', $post->id],
                        'style' => 'display: inline-block'
                    ]) !!}
                        <button title="Restore" typr="submit" class="btn btn-xs btn-default">
                            <i class="fa fa-refresh"></i>
                        </button>
                    {!! Form::close() !!}

                    {!! Form::open([
                        'method' => 'DELETE',
                        'route'  => ['backend.blog.force-destroy', $post->id],
                        'style' => 'display: inline-block'
                    ]) !!}
                        <button title="Delete Permanent" typr="submit" onclick="return confirm('You are about to delete a post permanently, Are you sure?')" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                    <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                </td>
            </tr>

        @endforeach
    </tbody>
</table>