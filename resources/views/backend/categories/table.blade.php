<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Title</td>
            <td width="120">Category name</td>
        <td width="150">Post count</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)

            <tr>
                <td>
                {!! Form::open([
                    'method' => 'DELETE',
                    'route'  => ['backend.categories.destroy', $category->id]
                ]) !!}
                    <a href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    @if($category->id == config('cms.default_category_id'))
                    <button onclick="return false" typr="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                    @else
                    <button onclick="return confirm('are you sur?')" typr="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                    @endif
                   
                    {!! Form::close() !!}
                </td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->posts->count() }}</td>
            </tr>

        @endforeach
    </tbody>
</table>