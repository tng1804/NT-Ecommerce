<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_product;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class pdfController extends Controller
{
    public function index($orderId)
    {
        set_time_limit(300); // Tăng thời gian thực thi lên 300 giây
        // Lấy đơn hàng
        $order = Order::find($orderId);
        // Lấy ra thông tin đơn hàng: sản phẩm, tổng tiền, ...
        $order_products = Order_product::where('order_id', $orderId)->get();
        $subTotal = $this->calculateSubTotalPrice($orderId);
        // Chuẩn bị dữ liệu cho view
        $data = ['order' => $order, 'order_products' => $order_products, 'subTotal' => $subTotal];

        // Tải view và truyền dữ liệu
        $pdf = PDF::loadView('admin.order.bill_english', $data)->setPaper('a4')->setWarnings(false);;

        // Trả về file PDF đã tạo để tải xuống
        return $pdf->download('Hoadon.pdf');
        // Kiểm tra xem có lỗi không
        // if ($response->isSuccessful()) {
        //     // Tệp đã được tải xuống thành công
        //     // Thiết lập thông điệp thành công trong session flash
        //     Session::flash('success', 'Tệp đã được tải xuống thành công.');
        //     return $response;
        // } else {
        //     // Có lỗi xảy ra khi tải xuống tệp
        //     // Thiết lập thông điệp lỗi trong session flash
        //     Session::flash('error', 'Đã có lỗi xảy ra khi tải xuống tệp.');
        //     // Redirect người dùng về trang trước đó hoặc một trang nào đó khác
        //     return redirect()->back();
        // }
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
