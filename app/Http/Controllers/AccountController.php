<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::orderBy('id', 'ASC')->paginate(5);
        // dd($accounts);
        return view('admin.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, user $user)
    {
        $request->validate([
            'email'=>'required|unique:users,email,'.$user->id,
            'phone'=>'required|unique:users,phone,'.$user->id,
        ]);
        $data = $request->all('name', 'email', 'phone', 'address');
        $data['password'] = bcrypt(request('password'));
        // dd($data);
        user::create($data);
        // return redirect()->route('account.index');
        echo "<script>
                alert('Thêm tài khoản thành công');
                window.location.href = '/admin/account';
                </script>";
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $user = user::where('id', $user_id)->first();
        // dd($user);
        return view('admin.account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $user = user::where('id', $user_id)->first();
        $request->validate([
            'email'=>'required|unique:users,email,'.$user->id,
            'phone'=>'required|unique:users,phone,'.$user->id,
        ]);
        $data = $request->all('name', 'email', 'phone', 'address','password');
        // dd($data);
        $user->update($data);
        return redirect()->route('account.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $user = user::where('id', $user_id)->first();
        $user->delete();
        echo "<script>
                alert('Xóa dữ liệu thành công');
                window.location.href = '/admin/account';
                </script>";
    }
}
