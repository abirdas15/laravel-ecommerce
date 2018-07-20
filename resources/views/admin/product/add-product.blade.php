@extends('admin.master')
@section('title')
Admin | Add Product
@endsection
@section('body')
<div id="page-wrapper">
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add New Product</h4>
                </div>
                <div class="panel-body">
                    @if(Session::get('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-lg-10 col-md-offset-1">
                            <form role="form" method="post" action="{{ route('save-product') }}" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-4">Product Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="category_id">
                                            <option value="">--Select Category--</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Product Brand</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="brand_id">
                                            <option value="">--Select Brand--</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="product_name">
                                        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Product Price</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="product_price">
                                        <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
                                    </div>
                                </div>
                               

                                <div class="form-group">
                                    <label class="col-md-4">Short Description</label>
                                    <div class="col-md-8">
                                        <textarea name="short_description" class="form-control"></textarea>
                                        <span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Long Description</label>
                                    <div class="col-md-8">
                                        <textarea name="long_description" id="editor" class="form-control"></textarea>
                                        <span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Product Image</label>
                                    <div class="col-md-8">
                                        <input type="file" accept="image/*" name="product_image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Publication Status</label>
                                    <div class="col-md-8">
                                        <label>
                                            <input type="radio" checked="" name="status" id="optionsRadios1" value="1">Published
                                        </label>
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2" value="0">Unpublished
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-block">Save Product</button>
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