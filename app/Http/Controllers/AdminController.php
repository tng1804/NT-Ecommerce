<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function login()
    {

        return view('admin.login');
    }
    public function logout()
{
    Auth::logout();
    return redirect()->route('admin.login'); // hoặc bất kỳ trang nào bạn muốn chuyển hướng sau khi đăng xuất
}
    public function check_login(Request $request)
    {
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $data = $request->all('email', 'password');
        // dd($data);
        if (auth()->attempt($data)) {
            $name = auth()->user()->name; // Lấy tên của người dùng đăng nhập
            return redirect()->route('admin.index', ['name' => $name]);
        } else {
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('admin.register');
    }
    public function check_register()
    {

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $data = request()->all('email', 'name');
        $data['password'] = bcrypt(request('password'));
        // dd($data);
        User::create($data);
        echo "<script>
                alert('Đăng ký tài khoản thành công');
                window.location.href = '/admin/login';
                </script>";
        // return redirect()->route('admin.login');
    }
}
