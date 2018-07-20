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
                <div class="col-md-12 well text-center text-success">
                    <br>
                    Dear: {{ Session::get('customerName') }}. You have to give us product shipping info to complete your valuableorder. If your billing info & Shipping info are same then just press on save shipping info.
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ route('save-shipping') }}" method="post">
                        {{ csrf_field() }}
                        <h3>Shipping Info goes here.... </h3><hr>
                        <div class="form-group">
                            <input type="text" value="{{ $customer->first_name.' '.$customer->last_name }}" class="form-control" name="full_name" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ $customer->email_address }}" class="form-control" name="email_address" placeholder="Email Address">
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ $customer->phone_number }}" class="form-control" name="phone_number" placeholder="Phone No">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" placeholder="Address">{{ $customer->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block">Save Shipping</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout -->	
</div>
@endsection
