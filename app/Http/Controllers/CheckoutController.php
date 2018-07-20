<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use Mail;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Product;
use Cart;

class CheckoutController extends Controller {

    public function index() {
        return view('front-end.checkout.checkout-content');
    }

    public function customerSignup(Request $request) {
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = $request->password;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);

        $data = $customer->toArray();

        Mail::send('front-end.mail.confirmation-mail', $data, function($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('Confirmation Mail');
        });
        return redirect('/Checkout/Shipping');
    }

    public function shipping() {
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping', [
            'customer' => $customer
        ]);
    }

    public function saveShipping(Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put('shippingId', $shipping->id);
        return redirect('/Checkout/Payment');
    }

    public function payment() {
        return view('front-end.checkout.payment');
    }

    public function newOrder(Request $request) {
        $paymentType = $request->payment_type;
        if ($paymentType == 'Cash') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Cart::total();
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $orderDetails = new OrderDetails();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetails->order_id = $order->id;
                $orderDetails->order_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }
            Cart::destroy();
            return redirect('/Complete/Order');
        }
    }
    public function compeleteOrder(){
        return 'Sucesses';
    }

}
