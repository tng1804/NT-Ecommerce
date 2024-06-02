<?php

namespace App\Http\Controllers;

use App\Mail\Forgot_Pass_Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            $user = auth()->user();
            if ($user->quyen == 0) {
                $name = $user->name; // Lấy tên của người dùng đăng nhập
                return redirect()->route('admin.index', ['name' => $name]);
            }
            else{
                auth()->logout();
                return redirect()->route('admin.login')->with('error', 'Bạn không phải admin. Không có quyền truy cập');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Thông tin đăng nhập không đúng.');
        }
    }

    public function register()
    {
        return view('admin.register');
    }
    public function check_register()
    {

        // var_dump(request(['name','email','phone','address', 'password']));
        // exit();
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $data = request()->all('email', 'name', 'phone', 'address');
        $data['password'] = bcrypt(request('password'));
        $data['quyen'] = 0;
        // dd($data);
        User::create($data);
        echo "<script>
                alert('Đăng ký tài khoản thành công');
                window.location.href = '/admin/login';
                </script>";
        // return redirect()->route('admin.login');
    }
    public function forgotPassword()
    {
        return view('admin.forgotPass');
    }
    public function sendMailPassWord()
    {
        $email = request('email');
        $user = User::where('email', $email)->first();

        // Kiểm tra xem người dùng có tồn tại hay không
        if (!$user) {
            return redirect()->back()->with('error', 'Email không tồn tại trong hệ thống.');
        }
        // Tạo một biến ngẫu nhiên (ví dụ: mã khôi phục mật khẩu)
        $randomPassword = rand(1000, 9999); // Sinh số ngẫu nhiên từ 1000 đến 9999
        // Bạn có thể lưu mã này vào cơ sở dữ liệu nếu cần thiết
        $user->password = $randomPassword;
        $user->save();
        // dd($user);
        // exit();

        // dd($name, $email, $phone, $content);
        Mail::to($email)->send(new Forgot_Pass_Email($user->name, $user->email, $randomPassword));
        // Trả về view hoặc redirect sau khi gửi email thành công
        // Lưu thông báo vào session
        session()->flash('message', 'Đã gửi email khôi phục mật khẩu thành công.');

        // Trả về view hoặc redirect sau khi gửi email thành công
        return redirect()->route('admin.forgotPassword');
    }
}
