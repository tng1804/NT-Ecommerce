<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth = auth()->user();
        $userId = auth()->id();
        $cart_list_items = Cart::where('user_id', $userId)->get();
        $totalPrice = $this->calculateTotalPrice();
        return view('checkout', compact('auth', 'cart_list_items', 'totalPrice'));
    }
    private function calculateTotalPrice()
    {
        $totalPrice = 0;
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->get();
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
                // Trừ đi số lượng sản phẩm trong bảng products
                $product = Product::find($cart->product_id);
                $product->quantity -= $cart->quantity;
                $product->save();
            }
            // Xoá giỏ hàng của người dùng sau khi đã đặt hàng thành công
            // $auth->user->carts()->delete();
            Cart::where('user_id', $auth->id)->delete();
            // Lấy ra mã đơn hàng vừa mới tạo
            $orderId = $order->id;
            // dd($orderId);
            return redirect()->route('order.succsessfully', $orderId);
        }
    }
    public function order_success($orderId)
    {
        // $orderId = Request('orderId');
        // dd($orderId);
        $products = Product::take(4)->get();
        return view('order_successfully', compact('orderId', 'products'));
    }
    public function order_detail($orderId)
    {
        // Lấy ra thông tin đơn hàng: tên khách hàng, địa chỉ, ...
        $order = Order::where('id', $orderId)->first();
        // Lấy ra thông tin đơn hàng: sản phẩm, tổng tiền, ...
        $order_products = Order_product::where('order_id', $orderId)->get();
        $subTotal = $this->calculateSubTotalPrice($orderId);
        // dd($order_products);
        return view('order_detail', compact('order', 'order_products','subTotal'));

    }
    private function calculateSubTotalPrice($orderId)
    {
        $subTotal = 0;
        $order_products = Order_product::where('order_id', $orderId)->get();
        foreach ($order_products as $item) {
            $subTotal += $item->quantity * $item->price;
        }
        return $subTotal;
    }
}
