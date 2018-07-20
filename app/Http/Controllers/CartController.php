<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller {

    public function addToCart(Request $request) {
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $request->qty,
            'options' => [
                'image' => $product->product_image
            ]
        ]);
        return redirect('/Cart/Show');
    }

    public function showCart() {
        $cartProducts = Cart::content();
        return view('front-end.cart.show-cart', [
            'cartProducts' => $cartProducts
        ]);
    }

    public function deleteCart($id) {
        Cart::remove($id);
        return redirect('/Cart/Show');
    }

}
