<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\ProductController;
use App\Models\Cart;
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

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/', [HomeController::class, 'index'])->name('home.index');
route::get('/product/{product}', [HomeController::class, 'product'])->name('home.product');
route::get('/category/{category}', [HomeController::class, 'category'])->name('home.category');
// Comment
route::post('/comment/{product_id}', [HomeController::class, 'post_comment'])->name('home.comment');
route::get('/comment/{comment_id}', [HomeController::class, 'delete_comment'])->name('home.deleteComment');
// Search product
route::post('/search', [HomeController::class, 'search_products'])->name('home.search');
// Contact
route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
route::post('/contact', [HomeController::class, 'sendMail']);
//About
route::get('/about', [HomeController::class, 'about'])->name('home.about');
// MyOrders
route::get('/myOrder', [HomeController::class, 'myOrder'])->name('home.myOrder');
route::put('/myOrder/cancelOrder/{id}', [CheckoutController::class, 'cancelOrder'])->name('myOrder.cancelOrder');

//Begin-cart//
route::post('/cart/{product_id}', [HomeController::class, 'post_to_cart'])->name('home.postCart');
route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
route::delete('/cart/{cart_id}', [HomeController::class, 'delete_to_cart'])->name('home.deleteCart');
route::get('/cart/delete', [HomeController::class, 'delete_all_cart'])->name('home.deleteCartAll');
Route::put('/cart/update/{id}', [HomeController::class, 'update'])->name('cart.update');

// Login
route::get('/login', [HomeController::class, 'login'])->name('home.login');
route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
route::post('/login', [HomeController::class, 'check_login']);


// Route::group(['prefix' => ''], function () {
// });
// -------ADMIN--------
route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
route::post('/admin/login', [AdminController::class, 'check_login']);

route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');

route::post('/admin/register', [AdminController::class, 'check_register']);
// route::get('/admin/account', [AdminController::class, 'viewAccount'])->name('admin.viewAccount');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    route::get('/', [AdminController::class, 'index'])->name('admin.index');
    route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'account' => AccountController::class,
    ]);

    // Hiển thị, Sửa, xóa đơn hàng
    route::get('/order', [CheckoutController::class, 'index'])->name('order.index');
    route::get('/order/edit/{id}', [CheckoutController::class, 'edit'])->name('order.edit');
    route::put('/order/update/{id}', [CheckoutController::class, 'update'])->name('order.update');
    route::delete('/order/delete/{id}', [CheckoutController::class, 'delete'])->name('order.delete');


    // Hóa đơn
    route::get('/order/bill/{id}', [CheckoutController::class, 'bill'])->name('order.bill');
    // Xuất hóa đơn ra file PDF
    Route::get('/order/pdf/{id}',[pdfController::class, 'index'])->name('order.exprotPdf');
});
Route::group(['prefix' => 'order', 'middleware' => 'auth'], function () {
    route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
    route::post('/checkout', [CheckoutController::class, 'post_checkout']);
    route::get('/checkout/succsessfully/{order_id}', [CheckoutController::class, 'order_success'])->name('order.succsessfully');
    route::get('/detail/{order_id}', [CheckoutController::class, 'order_detail'])->name('order.detail');
});
