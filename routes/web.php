<?php

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\Product_imgController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\orderClientController;
use App\Http\Controllers\Client\DetailController;
use App\Http\Controllers\Client\EmpController;
use App\Http\Controllers\Client\ListController;
use App\Http\Controllers\Client\PayController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\findStoreController;
use App\Http\Controllers\Client\ChangePasswordController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Print_OrderController;
// use App\Http\Controllers\Admin\Order_detailController;
use App\Http\Controllers\Account\AccountController;

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
Route::prefix('/')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('client.index');
    Route::get('/category/{slug?}', [ListController::class, 'index'])->name('client.list');
    Route::get('/detail/{slug}/{id}', [DetailController::class, 'index'])->name('client.detail');
    Route::get('/cart', [CartController::class, 'index'])->middleware(\App\Http\Middleware\CheckAuth::class)->name('client.cart');
    Route::post('/add-cart', [CartController::class, 'add'])->middleware(\App\Http\Middleware\CheckAuth::class)->name('cart.add');
    Route::get('/remove-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/update-cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/login', [EmpController::class,'login'])->name('client.login');
    Route::post('/login', [EmpController::class,'postlogin'])->middleware(\App\Http\Middleware\Customer::class)->name('client.postlogin');
    Route::get('/client-logout', [EmpController::class, 'logout'])->name('client.logout');

    Route::get('/register', [EmpController::class,'register'])->name('client.register');
    Route::post('/register', [EmpController::class,'postRegisterClient'])->name('client.postRegister');

    Route::get('/forgotPassword', [EmpController::class,'forgotPassword'])->name('client.forgotPassword');
    Route::post('/forgotPassword', [EmpController::class,'postForgotPassword'])->name('client.postForgotPassword');

    Route::get('/get_password/{user}/{token}', [EmpController::class,'get_password'])->name('client.get_password');
    Route::post('/get_password/{user}/{token}', [EmpController::class,'post_password'])->name('client.post_password');

    Route::get('/get_active', [EmpController::class,'get_active'])->name('client.get_active');
    Route::post('/get_active', [EmpController::class,'post_active'])->name('client.post.acitve');

    Route::get('/actived/{user}/{token}', [EmpController::class,'actived'])->name('client.actived');
    Route::get('/pay',[PayController::class,'index'])->name('client.pay');
    Route::post('/pay',[PayController::class,'store'])->name('client.store');

    Route::resource('/profile', ProfileController::class);

    Route::resource('/orderClient', OrderClientController::class);
    
    Route::get('/change_pass', [ChangePasswordController::class,'change_pass'])->name('client.change_pass');
    Route::post('/change_pass', [ChangePasswordController::class,'postchange_pass'])->name('client.postchange_pass');

    Route::get('/get_change_password/{user}/{token}', [ChangePasswordController::class,'get_change_password'])->name('client.get_change_password');
    Route::post('/get_change_password/{user}/{token}', [ChangePasswordController::class,'post_change_password'])->name('client.post_change_password');

    Route::get('/findStore', [findStoreController::class, 'index'])->name('client.findStore');
});
Route::get('/admin-register', [AccountController::class, 'register'])->name('account.register');
Route::post('/admin-register', [AccountController::class, 'postRegister'])->name('account.register');
Route::get('/admin-login', [AccountController::class, 'login'])->name('account.login');
Route::post('/admin-login', [AccountController::class, 'postLogin'])->name('account.login');
Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index.index');
    Route::resource('/category', CategoryController::class);
    Route::get('/category-trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/{id}/forceDelete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    Route::get('/category/delete/all', [CategoryController::class, 'deleteAll'])->name('category.deleteAll');
    Route::get('/category/restore/all', [CategoryController::class, 'restoreAll'])->name('category.restoreAll');
    Route::resource('/product', ProductController::class);
    Route::get('product/{id}/preview', [ProductController::class, 'preview'])->name('product.preview');
    Route::get('product_img/{id}/delete', [Product_imgController::class, 'delete'])->name('product_img.delete');
    Route::resource('/user', UserController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/order', OrderController::class);
    Route::get('order/invoice/{id}', [InvoiceController::class, 'index'])->name('invoice.index');
});
