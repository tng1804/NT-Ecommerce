<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\MessageMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $products = Product::where('name', 'like', '%' . $data['search'] . '%')->get();
        return view('index', compact('products', 'cats'));   // Không cần truyền cats
    }

    public function post_to_cart($proId)
    {
        // Vardump dữ liệu của request để kiểm tra
        // var_dump(request()->all('comment'));exit();
        $data = request()->all('quantity', 'price');
        // $total_price = $data['price']*$data['quantity'];
        // $data['price'] = $total_price;
        $data['product_id'] = $proId;
        $data['user_id'] = auth()->id();
        // dd($data);
        if (Cart::create($data)) {
            return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
            // window.location.href = '/admin/product';

            // return redirect()->back();
        }
        // return redirect()->back();
    }
    public function cart()
    {
        $userId = auth()->id();
        $cart_list_items = Cart::where('user_id', $userId)->get();
        // $product_cart = Cart::where('user_id', $userId)->get();
        // dd($cart_list_user);
        return view('cart', compact('cart_list_items'));
    }


    public function delete_comment($comm_id)
    {
        // dùng thẻ a-> đẩy sang route->dùng phương thức get để lấy là đẩy qua controller để xử lý
        // dd($comm_id);
        Comment::where('id', $comm_id)->delete();
        return redirect()->back();
    }
    public function delete_to_cart($cart_id)
    {
        // dd($cart);

        Cart::where('id', $cart_id)->delete();
        return redirect()->back();
    }
    public function delete_all_cart(){
        Cart::truncate();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::find($id);
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Cập nhật tổng giá tiền của toàn bộ giỏ hàng
        $totalPrice = $this->calculateTotalPrice();
        // var_dump($totalPrice);
        // exit();
        return response()->json(['success' => 'Cart item updated', 'cartItem' => $cartItem, 'totalPrice' => $totalPrice]);
        // return redirect()->back();
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

    public function contact(){
        return view('contact');
    }
    public function sendMail(){
        // $email = 'tranvanngoc180403@gmail.com';
        // Mail::to($email)->send(new ContactEmail);
        // return redirect()->route('home.contact')->with('message', 'Đã gửi liên hệ email thành công. 
        // Vui lòng chờ đợi trong giây lát, chúng tôi sẽ liên hệ với bạn');

        // $data = request(['name', 'email', 'phone', 'content']);
        // dd($data);
        $name = request('name');
        $email = request('email');
        $phone = request('phone');
        $content = request('content');
        // dd($name, $email, $phone, $content);
        Mail::to($email)->send(new ContactEmail($name, $email, $phone, $content));
        // return redirect()->route('home.contact')->with('message', 'Đã gửi liên hệ email thành công. 
        // Vui lòng chờ đợi trong giây lát, chúng tôi sẽ liên hệ với bạn');
        return view('email.contactSuccess');
    }

    public function about(){
        return view('about');
    }
    public function myOrder(){
        $user = auth()->id();
        // dd($user);
        $orders = Order::where('user_id',$user)->get();
        $order_details = Order_product::select(DB::raw('order_id, sum(quantity) as total_quantity, SUM(quantity * price) AS total_price '))->groupBy('order_id')->get();
        // dd($order_detail);
        return view('myOrder', compact('orders', 'order_details'));
    }
    // Xây dựng function khi thêm sản phẩm sẽ gửi thông báo đến email của user.
    public function messageProduct(){
        return view('messageProduct');
    }
    public function sendEmailProduct($id, $name,$image, $quantity, $price, $desciption){
        foreach(User::all() as $user){
            Mail::to($user->email)->send(new MessageMail($id,$user->name, $name,$image, $quantity, $price, $desciption));
        }
    }
}
