@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@elseif(session('error-message'))
    <div class="alert alert-danger">
        {{ session('error-message') }}
    </div>
@elseif(session('trash-message'))
    
    @php list($message, $postID) = session('trash-message'); @endphp   
    
    {!! Form::open(['method' => 'PUT','route'  => ['backend.blog.restore', $postID]]) !!}
        <div class="alert alert-info">
            {{ $message }}
            <button typr="submit" class="btn btn-sm btn-warning">
            <i class="fa fa-undo"></i>Undo
            </button>
        </div>
    {!! Form::close() !!}
    
@endif