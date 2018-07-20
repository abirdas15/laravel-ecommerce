<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacturer;

class ManufacturerController extends Controller {

    public function index() {
        return view('admin.manufacturer.add-manufacturer');
    }

    public function saveManufacturer(Request $request) {
        $manufacturer = new Manufacturer();
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->description = $request->description;
        $manufacturer->status = $request->status;
        $manufacturer->save();
        return redirect('/Manufacturer/AddManufacturer')->with('message', 'Sucessfully Save Manufacturer');
    }

    public function manageManufacturer() {
        $manufacturer = Manufacturer::orderBy('id', 'DESC')->get();
        return view('admin.manufacturer.manage-manufacturer', ['manufacturers' => $manufacturer]);
    }

    public function unpublishedManufacturer($id) {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->status = 0;
        $manufacturer->save();
        return redirect('/Manufacturer/ManageManufacturer');
    }

    public function publishedManufacturer($id) {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->status = 1;
        $manufacturer->save();
        return redirect('/Manufacturer/ManageManufacturer');
    }

    public function editManufacturer($id) {
        $manufacturer = Manufacturer::find($id);
        return view('admin.manufacturer.edit-manufacturer', ['manufacturer' => $manufacturer]);
    }

    public function updateManufacturer(Request $request) {
        $id = $request->id;
        $manufacturer = Manufacturer::find($id);
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->description = $request->description;
        $manufacturer->status = $request->status;
        $manufacturer->save();
        return redirect('/Manufacturer/EditManufacturer/' . $id)->with('message', 'Sucessfully Update Manufacturer');
    }

    public function deleteManufacturer($id) {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/Manufacturer/ManageManufacturer');
    }

}
