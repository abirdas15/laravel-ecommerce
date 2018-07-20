<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;

class ProductController extends Controller {

    public function index() {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('admin.product.add-product', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function saveProduct(Request $request) {
        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        $product_image = $request->file('product_image');
        $file_type = $product_image->getClientOriginalExtension();
        $image_name = $request->product_name . '.' . $file_type;
        $directory = 'product_image/';
        $image_url = $directory . $image_name;
        Image::make($product_image)->resize(200, 200)->save($image_url);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;

        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $image_url;
        $product->status = $request->status;
        $product->save();
        return redirect('/Product/AddProduct')->with('message', 'Product Save Sucessfully');
    }

    public function manageProduct() {
        $products = DB::table('products')
                ->orderBy('products.id', 'DESC')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->select('products.*','categories.category_name','brands.brand_name')
                ->get();
        return view('admin.product.manage-product', ['products' => $products]);
    }

}
