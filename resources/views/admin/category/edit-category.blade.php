@extends('admin.master')
@section('title')
Admin|Category
@endsection
@section('body')
<div id="page-wrapper">
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Update Category From</h4>
                </div>
                <div class="panel-body">
                    @if(Session::get('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-lg-8 col-md-offset-1">
                            <form role="form" method="post" action="{{ route('update-category') }}" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="form-group">
                                    <label class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" value="{{ $category->category_name }}" type="text" name="category_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Description</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4">Publication Status</label>
                                    <div class="col-md-8">
                                        @if($category->status==1)
                                        <label>
                                            <input type="radio" checked="" name="status" id="optionsRadios1" value="1">Published
                                        </label>
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2" value="0">Unpublished
                                        </label>
                                        @else
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios1" value="1">Published
                                        </label>
                                        <label>
                                            <input type="radio" checked="" name="status" id="optionsRadios2" value="0">Unpublished
                                        </label>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-block">Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@endsection