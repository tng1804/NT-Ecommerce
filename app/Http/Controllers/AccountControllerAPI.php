<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AccountControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        if ($id == null) {
            return User::orderBy('name', 'ASC')->get();
        } else {
            return User::find($id);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            return User::create($data);
        } catch (Throwable $err) {
            return $err->getMessage();
        }
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Kiểm tra xem số điện thoại đã tồn tại chưa
        // $existingUser = User::where('phone', $request->phone)->first();
        // if ($existingUser) {
        //     return response()->json(['message' => 'Phone number already exists'], 400);
        // }
        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return $user;
        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // try{
        //     $user = User::find($id);
        //     $request->validate([
        //         'email'=>'required|unique:users,email,'.$user->id,
        //         'phone'=>'required|unique:users,phone,'.$user->id,
        //     ]);
        //     $data = $request->all('name', 'email', 'phone', 'address','password');
        //     $user->update($data);
        //     return response()->json($user, 200);
        // }
        // catch(Throwable $err){
        //     return $err->getMessage();
        // }

        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'phone' => 'required|string|max:15|unique:users,phone,' . $user->id,
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                // 'password' => 'required|string|confirmed',

            ]);
            $data = $request->only('name', 'email', 'phone', 'address');
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
            return response()->json($user, 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->getMessage()], 422);
        } catch (Throwable $err) {
            return response()->json(['message' => $err->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if(!$user){
                return response()->json(['message'=>'User not found', 404]);
            }
            else{
                $user->delete();
                return $user;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
