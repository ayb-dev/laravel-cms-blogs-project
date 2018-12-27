@extends('layouts.backend.main')

@section('title', 'MyBlog | Categories')

@section('content')
<style>
a.selected-status{
    font-weight: bold;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        categories
        <small>Display All categories</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('backend.categories.index') }}">categories</a></li>
        <li class="active">All categories</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header clearfix">
                <div class="pull-left">
                    <a href="{{ route('backend.categories.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <div class="pull-right" style="padding:7px 0;">   
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                
                @include('backend.partials.message')

                @if (! $categories->count())
                    <div class="alert alert-danger">
                        <strong>No record found</strong>
                    </div>
                @else
                    @include('backend.categories.table')                    
                @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pull-left">
                    {{ $categories->appends(Request::query())->render() }}
                </div>
                <div class="pull-right">
                    <small>{{ $categoriesCount }} {{ str_plural('Item', $categoriesCount) }}</small>
                </div>
            </div>
            </div>
            <!-- /.box -->
        </div>
        </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
