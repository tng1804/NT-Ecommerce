<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
route::post('/comment/{product_id}', [HomeController::class, 'post_comment'])->name('home.comment');
route::post('/search', [HomeController::class, 'search_products'])->name('home.search');

//Begin-cart//
route::post('/cart/{product_id}', [HomeController::class, 'post_to_cart'])->name('home.postCart');
route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
// route::resources([
//     'cart' => Cart::class
// ]);

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    route::get('/', [AdminController::class, 'index'])->name('admin.index');
    route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);
});
