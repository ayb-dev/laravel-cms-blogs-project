@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new user')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        users
          <small>Delete confirmation</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('backend.users.index') }}">user</a></li>
          <li class="active">Delete confirmation</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($user, [
                  'method' => 'DELETE',
                  'route'  => ['backend.users.destroy', $user->id]
              ]) !!}

              <div class="col-xs-9">
                <div class="box">
                  <div class="box-body">
                    <p>You have specified this user for deletion</p>
                    <p>ID #{{$user->id}} : {{$user->name}}</p>
                    <p>What shold be done by content own of this user?</p>
                    <p>
                      <input type="radio" name="delete_option" value="delete">Delete All Content
                    </p>
                    <p>
                      <input type="radio" name="delete_option" value="attribute">Attribute content to:
                      {!! Form::select('selected_user', $users, null, ['class' => 'form-control']) !!}
                    </p>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                    <a href="{{ route('backend.users.index') }}" class="btn btn-default">Cancel</a>
                  </div>
                </div>
              </div>

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection