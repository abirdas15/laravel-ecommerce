@extends('admin.master')
@section('title')
Admin|Category
@endsection
@section('body')

<div id="page-wrapper">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manufacturer List</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th>Sl No</th>
                                <th>Manufacturer Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($manufacturers as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->manufacturer_name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->status==1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    @if($data->status==1)
                                    <a class="btn btn-xs btn-info" href="{{ route('unpublished-manufacturer',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-arrow-up"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-xs btn-warning" href="{{ route('published-manufacturer',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-arrow-down"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-xs btn-success" href="{{ route('edit-manufacturer',['id'=>$data->id]) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger" onclick="return confirm('Do you want to remove this ?')"  href="{{ route('delete-manufacturer',['id'=>$data->id]) }}">
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