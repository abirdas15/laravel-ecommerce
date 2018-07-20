@extends('front-end.master')
@section('title')
Ecommerce | Payment
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
                <div class="col-md-12 well text-center text-success">
                    <br>
                    Dear: {{ Session::get('customerName') }}. You have to give us product shipping info to complete your valuableorder. If your billing info & Shipping info are same then just press on save shipping info.
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 well">
                    <form action="{{ route('new-order') }}" method="post">
                        {{ csrf_field() }}
                        <h3>Payment From.... </h3><hr>
                        <table class="table table-bordered">
                            <tr>
                                <th>Cash on Delivery</th>
                                <td><input type="radio" name="payment_type" value="Cash">Cash on Delivery</td>
                            </tr>
                            <tr>
                                <th>Paypal</th>
                                <td><input type="radio" name="payment_type" value="Paypal">Paypal</td>
                            </tr>
                            <tr>
                                <th>Bkash</th>
                                <td><input type="radio" name="payment_type" value="Bkash">Bkash</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" name="btn" value="Confirm Order"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout -->	
</div>
@endsection
