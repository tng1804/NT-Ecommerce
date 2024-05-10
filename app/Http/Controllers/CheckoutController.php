<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth = auth()->user();
        $userId = auth()->id();
        $cart_list_items = Cart::where('user_id', $userId)->get();
        $totalPrice = $this->calculateTotalPrice();
        return view('checkout', compact('auth','cart_list_items','totalPrice'));
    }
    private function calculateTotalPrice()
    {
        $totalPrice = 0;
        $cartItems = Cart::all();
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->price;
        }
        return $totalPrice;
    }
    public function post_checkout(Request $req)
    {
        $auth = auth()->user();
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ], [
            'name.required' => 'Họ tên không được để trống.'
        ]);
        $data = $req->only('name', 'email', 'phone', 'address');
        $data['user_id'] = $auth->id;
        // dd($data);
        if ($order = Order::create($data)) {
            foreach ($auth->carts as $cart) {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity
                ];
                Order_product::create($data1);
                
            }
            // Xoá giỏ hàng của người dùng sau khi đã đặt hàng thành công
            // $auth->user->carts()->delete();
            Cart::where('user_id', $auth->id)->delete();
            return redirect()->back()->with('success', 'Đã đặt hàng thành công!');
        }
    }
}
