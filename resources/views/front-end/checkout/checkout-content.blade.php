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
                    <div class="well">
                        <h3>You have to login to complete your valuable order. If you are not register then register first</h3>
                    </div>
                    <form action="{{ route('customer-signup') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-5 well">
                            <h3>Register if you are no register before !</h3><hr>
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email_address" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone No">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-block">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-5 well pull-right">
                        <h3>Already Register ? Login Here !</h3><hr>
                        <div class="form-group">
                            <input type="text" class="form-control" name="" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">Register</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- checkout -->	
</div>
@endsection
