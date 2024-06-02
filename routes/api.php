<?php

use App\Http\Controllers\AccountControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Yêu cầu xác thực đăng nhập trước
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route để lấy thông tin người dùng với ID tùy chọn, chỉ dành cho người dùng đã đăng nhập
// Route::middleware('auth:sanctum')->get('/getUser/{id?}', [AccountControllerAPI::class, 'index'])->name('user.get');
Route::get('/getUser/{id?}',[AccountControllerAPI::class, 'index'])->name('user.get');
// Route::get('/User/{id}',[AccountControllerAPI::class, 'show'])->name('user.show');
Route::post('/postUser',[AccountControllerAPI::class, 'store'])->name('user.post');
Route::put('/putUser/{id}',[AccountControllerAPI::class, 'update'])->name('user.put');
Route::delete('/deleteUser/{id}',[AccountControllerAPI::class, 'destroy'])->name('user.delete');


