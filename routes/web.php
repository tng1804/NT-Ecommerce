<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::group(['prefix'=> ''], function () {
    route::get('/',[HomeController::class, 'index'] )->name('home.index');
});
route::get('/admin/login',[AdminController::class, 'login'] )->name('admin.login');
route::post('/admin/login',[AdminController::class, 'check_login'] );

route::get('/admin/register',[AdminController::class, 'register'] )->name('admin.register');
route::post('/admin/register',[AdminController::class, 'check_register'] );

Route::group(['prefix'=> 'admin', 'middleware'=>'auth'], function () {
    route::get('/',[AdminController::class, 'index'] )->name('admin.index');

    route::resources([
        'category'=>CategoryController::class,
        'product'=>ProductController::class,
    ]);
});