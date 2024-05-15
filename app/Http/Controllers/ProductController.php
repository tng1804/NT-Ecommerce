<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'ASC')->paginate(5); // Phaan trang
        // $products->appends(['sort'=>'votes']); // Thêm phần login magination lên url

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->get();
        // dd($cats);
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->all('name', 'image','quantity', 'price', 'content', 'category_id');
        // dd($data);
        Product::create($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $cat = Category::where('id', $product->category_id)->get();
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.edit', compact('product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = request()->all('name', 'image','quantity', 'price', 'content', 'category_id');
        $product->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // dd($product);
        $product->delete();
        echo "<script>
                alert('Xóa dữ liệu thành công');
                window.location.href = '/admin/product';
                </script>";
    }
}
