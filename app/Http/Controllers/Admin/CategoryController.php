<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller {

    public function index() {
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request) {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect('/Category/AddCategory')->with('message', "Sucessfully Save Category");
    }

    public function manageCategory() {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.manage-category', ['categories' => $category]);
    }

    public function unpublishedCategory($id) {
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        return redirect('/Category/ManageCategory');
    }

    public function publishedCategory($id) {
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        return redirect('/Category/ManageCategory');
    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('admin.category.edit-category', ['category' => $category]);
    }

    public function updateCategory(Request $request) {
        $id = $request->id;
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect('/Category/EditCategory/' . $id)->with('message', 'Sucessfully Update Category');
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/Category/ManageCategory');
    }

}
