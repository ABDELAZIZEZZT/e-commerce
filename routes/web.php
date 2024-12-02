<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\emailcontroller;
use App\Http\Controllers\ordercontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\userController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () { return view('login');})->name('login.view');
    Route::post('/method/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', function () { return view('register');})->name("register.view");
    Route::post('/method/register', [AuthController::class, 'register'])->name('register');

    Route::get('/reset/view', function () { return view('reset');});


    Route::post('/sent-email', [emailcontroller::class, 'reset'])->name('reset');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [userController::class, 'profile'])->name('profile.view');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/cart',  [cartcontroller::class, 'view_cart'])->name('view.cart');
    Route::post('/addToCart', [cartcontroller::class, 'add_to_cart'])->name('add.cart');
    Route::delete('/Cart/delet/{id}', [cartcontroller::class, 'delet_product'])->name("product.delet");
    Route::get('/Cart/deletall/', [cartcontroller::class, 'delete_all_product'])->name("product.delet.all");

    Route::get('/Cart/checkout/', [cartcontroller::class, 'ckeckout_product'])->name("product.checkout");

    Route::get('/orders',[ordercontroller::class, 'order'])->name("order");
    Route::post('/order/confirm', [ordercontroller::class, 'confirm_order'])->name("order.confirm");
    Route::delete('/order/delete', [ordercontroller::class, 'delete_order'])->name("order.delete");
    Route::post('/sent/message', [userController::class, 'message'])->name("message");

});

Route::get('/',  [userController::class, 'home'])->name('home');
Route::get('/about', function () { return view('about');});
Route::get('/contact', function () { return view('contact');})->name('contact');
Route::get('/product', function () { return view('product');});
Route::get('/about', function () { return view('about_us');});

Route::post('/', [productcontroller::class,'search'])->name('products.search');
Route::get('/category{id}', [categorycontroller::class,'category'])->name('category');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [admincontroller::class,'home'])->name('admin.home');

    Route::get('/admin/product', [admincontroller::class,'product'])->name('product');
    Route::post('/admin/add-product', [productcontroller::class,'add_product'])->name('add.product');
    Route::get('/admin/update-product{id}', [productcontroller::class,'update_product'])->name('update.product');
    Route::put('/admin/update-product{id}/realy', [productcontroller::class,'realy_update_product'])->name('realy.update.product');
    Route::delete('/admin/delete-product{id}', [productcontroller::class,'delete_product'])->name('delete.product');

    /////////////////////////////////
    Route::get('/admin/categories', [admincontroller::class,'categories'])->name('categories');
    Route::post('/admin/add-category', [categorycontroller::class,'add_category'])->name('add.category');
    Route::get('/admin/update-category{id}', [categorycontroller::class,'update_category'])->name('update.category');
    Route::put('/admin/update-category{id}/realy', [categorycontroller::class,'realy_update_category'])->name('realy.update.category');
    Route::delete('/admin/delete-category{id}', [categorycontroller::class,'delete_category'])->name('delete.category');

    /////////////////////////////////
    Route::get('admin/message', [admincontroller::class,'message'])->name('admin.message');


});



