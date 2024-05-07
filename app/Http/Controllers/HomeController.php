<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('name', 'ASC')->get(); // Có thể bỏ do truyền toàn cục
        $products = Product::orderBy('id', 'DESC')->limit(6)->get();
        return view('index', compact('cats', 'products'));
    }
    public function product(Product $product)
    {
        $cats = Category::orderBy('name', 'ASC')->get(); // Có thể bỏ do truyền toàn cục
        $comments = Comment::where('product_id', $product->id)->orderBy('id', 'DESC')->get();
        return view('product', compact('product', ['cats', 'comments']));   // Không cần truyền cats
    }
    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('category', compact('category', 'products'));
    }

    public function login()
    {

        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.login'); // hoặc bất kỳ trang nào bạn muốn chuyển hướng sau khi đăng xuất
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
            return redirect()->route('home.index', ['name' => $name]);
        } else {
            return redirect()->back();
        }
    }

    public function post_comment($proId)
    {
        // Vardump dữ liệu của request để kiểm tra
        // var_dump(request()->all('comment'));exit();
        $data = request()->all('content');
        $data['product_id'] = $proId;
        $data['user_id'] = auth()->id();
        // dd($data);
        if (Comment::create($data)) {
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function search_products()
    {
        $data = request()->all('search');  // lấy dữ liệu ở input
        // dd($data);
        $cats = Category::orderBy('name', 'ASC')->get(); // Có thể bỏ do truyền toàn cục
        // $products = Product::where('name', $data)->get();
        $products = Product::where('name', 'like', '%'. $data['search'] . '%')->get();
        return view('index', compact('products', 'cats'));   // Không cần truyền cats
    }

    public function post_to_cart($proId)
    {
        // Vardump dữ liệu của request để kiểm tra
        // var_dump(request()->all('comment'));exit();
        $data = request()->all('quantity', 'price');
        $total_price = $data['price']*$data['quantity'];
        $data['price'] = $total_price;
        $data['product_id'] = $proId;
        $data['user_id'] = auth()->id();
        // dd($data);
        if (Cart::create($data)) {
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function cart(){
        $userId = auth()->id();
        $cart_list_items = Cart::where('user_id', $userId)->get();
        // $product_cart = Cart::where('user_id', $userId)->get();
        // dd($cart_list_user);
        return view('cart', compact('cart_list_items'));
    }

}
