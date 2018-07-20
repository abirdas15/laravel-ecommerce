@extends('front-end.master')
@section('title')
Ecommerce | Checkout
@endsection
@section('body')
<div class="banner1">
    <div class="container">
        <h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
    </div>
</div>
<!--banner-->

<!--content-->
<div class="content">
    <div class="cart-items">
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <h3 class="text-center text-success">My Shopping Cart</h3><hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price Tk.</th>
                                <th>Quantity</th>
                                <th>Total Price Tk.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @php($sum = 0)
                            @foreach($cartProducts as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset($product->options->image) }}" height="50" width="50"></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $total =  $product->qty*$product->price }}</td>
                                <td>
                                    <a href="{{ route('delete-cart',['rowId'=>$product->rowId]) }}" class="btn btn-danger" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $sum += $total; ?>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Item Total Price (TK. )</th>
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr>
                            <th>Vat Total (TK. )</th>
                            <td>{{ $vat = 0 }}</td>
                        </tr>
                        <tr>
                            <th>Grand Total (TK. )</th>
                            <td>{{ $sum+$vat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout</a>
                    <a class="btn btn-success">Continue Shoping</a>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout -->	
</div>
@endsection