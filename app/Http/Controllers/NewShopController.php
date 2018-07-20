<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class NewShopController extends Controller {

    public function index() {
        $newProducts = Product::where('status', 1)
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
        return view('front-end.home.home', [
            'newProducts' => $newProducts
        ]);
    }

    public function categoryProduct($id) {
        $categoryProducts = Product::where('category_id', $id)
                ->where('status', 1)
                ->get();
        return view('front-end.product.category-product', [
            'categoryProducts' => $categoryProducts
        ]);
    }

    public function productDetails($id) {
        $product = Product::find($id);
        return view('front-end.product.product-details', [
            'product' => $product
        ]);
    }

}
