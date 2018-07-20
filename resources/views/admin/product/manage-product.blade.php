@extends('admin.master')
@section('title')
Admin|Product
@endsection
@section('body')

<div id="page-wrapper">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Product List</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Category Name</th>
                                <th>Brand Name Name</th>
                                <th>Product Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($products as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->product_name }}</td>
                                <td><img width="100" height="100" src="{{ asset($data->product_image) }}"></td>
                                <td>{{ $data->category_name }}</td>
                                <td>{{ $data->brand_name }}</td>
                                <td>{{ number_format($data->product_price,2) }}</td>
                                <td>{{ $data->status==1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    @if($data->status==1)
                                    <a class="btn btn-xs btn-info" href="{{ route('unpublished-category',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-arrow-up"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-xs btn-warning" href="{{ route('published-category',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-arrow-down"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-xs btn-success" href="{{ route('edit-category',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger" onclick="return confirm('Do you want to remove this ?')"  href="{{ route('delete-category',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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