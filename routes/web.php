<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('/', [
    'uses' => 'NewShopController@index',
    'as' => '/'
]);
Route::get('/CategoryProduct/{id}', [
    'uses' => 'NewShopController@categoryProduct',
    'as' => 'category-product'
]);

Route::get('/Category/AddCategory', [
    'uses' => 'Admin\CategoryController@index',
    'as' => 'add-category'
]);

Route::get('/Category/ManageCategory', [
    'uses' => 'Admin\CategoryController@manageCategory',
    'as' => 'magage-category'
]);
Route::post('/Category/Save', [
    'uses' => 'Admin\CategoryController@saveCategory',
    'as' => 'save-category'
]);

Route::get('/Category/UnpublishedCategory/{id}', [
    'uses' => 'Admin\CategoryController@unpublishedCategory',
    'as' => 'unpublished-category'
]);

Route::get('/Category/PublishedCategory/{id}', [
    'uses' => 'Admin\CategoryController@publishedCategory',
    'as' => 'published-category'
]);

Route::get('/Category/EditCategory/{id}', [
    'uses' => 'Admin\CategoryController@editCategory',
    'as' => 'edit-category'
]);
Route::post('/Category/UpdateCategory', [
    'uses' => 'Admin\CategoryController@updateCategory',
    'as' => 'update-category'
]);
Route::get('/Category/DeleteCategory/{id}', [
    'uses' => 'Admin\CategoryController@deleteCategory',
    'as' => 'delete-category'
]);

Route::get('/Manufacturer/AddManufacturer', [
    'uses' => 'Admin\ManufacturerController@index',
    'as' => 'add-manufacturer'
]);
Route::get('/Manufacturer/ManageManufacturer', [
    'uses' => 'Admin\ManufacturerController@manageManufacturer',
    'as' => 'manage-manufacturer'
]);
Route::post('/Manufacturer/SaveManufacturer', [
    'uses' => 'Admin\ManufacturerController@saveManufacturer',
    'as' => 'save-manufacturer'
]);
Route::get('/Manufacturer/UnpublishedManufacturer/{id}', [
    'uses' => 'Admin\ManufacturerController@unpublishedManufacturer',
    'as' => 'unpublished-manufacturer'
]);
Route::get('/Manufacturer/PublishedManufacturer/{id}', [
    'uses' => 'Admin\ManufacturerController@publishedManufacturer',
    'as' => 'published-manufacturer'
]);
Route::get('/Manufacturer/EditManufacturer/{id}', [
    'uses' => 'Admin\ManufacturerController@editManufacturer',
    'as' => 'edit-manufacturer'
]);
Route::post('/Manufacturer/UpdateManufacturer', [
    'uses' => 'Admin\ManufacturerController@updateManufacturer',
    'as' => 'update-manufacturer'
]);
Route::get('/Manufacturer/DeleteManufacturer/{id}', [
    'uses' => 'Admin\ManufacturerController@deleteManufacturer',
    'as' => 'delete-manufacturer'
]);
Route::get('/Brand/ManageBrand', [
    'uses' => 'Admin\BrandController@index',
    'as' => 'manage-brand'
]);
Route::get('/Brand/AddBrand', [
    'uses' => 'Admin\BrandController@addBrand',
    'as' => 'add-brand'
]);
Route::post('/Brand/SaveBrand', [
    'uses' => 'Admin\BrandController@saveBrand',
    'as' => 'save-brand'
]);
Route::get('/Product/AddProduct', [
    'uses' => 'Admin\ProductController@index',
    'as' => 'add-product'
]);
Route::post('/Product/SaveProduct', [
    'uses' => 'Admin\ProductController@saveProduct',
    'as' => 'save-product'
]);
Route::get('/Product/ManageProduct', [
    'uses' => 'Admin\ProductController@manageProduct',
    'as' => 'manage-product'
]);
Route::get('/Product/ProductDetails/{id}', [
    'uses' => 'NewShopController@productDetails',
    'as' => 'product-details'
]);
Route::post('/Cart/Add', [
    'uses' => 'CartController@addToCart',
    'as' => 'add-to-cart'
]);
Route::get('/Cart/Show', [
    'uses' => 'CartController@showCart',
    'as' => 'show-cart'
]);
Route::get('/Cart/Delete/{id}', [
    'uses' => 'CartController@deleteCart',
    'as' => 'delete-cart'
]);
Route::get('/Checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'checkout'
]);
Route::post('/Signup', [
    'uses' => 'CheckoutController@customerSignup',
    'as' => 'customer-signup'
]);
Route::get('/Checkout/Shipping', [
    'uses' => 'CheckoutController@shipping',
    'as' => 'shipping'
]);
Route::post('/Checkout/SaveShipping', [
    'uses' => 'CheckoutController@saveShipping',
    'as' => 'save-shipping'
]);
Route::get('/Checkout/Payment', [
    'uses' => 'CheckoutController@payment',
    'as' => 'payment'
]);
Route::post('/Checkout/Order', [
    'uses' => 'CheckoutController@newOrder',
    'as' => 'new-order'
]);
Route::post('/Complete/Order', [
    'uses' => 'CheckoutController@compeleteOrder',
    'as' => 'complete-order'
]);





Route::get('/home', 'Admin\DashboardController@index');
Auth::routes();


