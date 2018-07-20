<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller {

    public function index() {
        $brand = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.manage-brand', ['brand' => $brand]);
    }

    public function addBrand() {
        return view('admin.brand.add-brand');
    }

    public function saveBrand(Request $request) {
        $this->validate($request, [
            'brand_name' => 'required'
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();
        return redirect('/Brand/AddBrand')->with('message', 'Sucessfully Save Brand');
    }

}
