<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIUserControllerToView extends Controller
{
    public function fetchData(){
        // Thực hiện yêu cầu HTTP tới API
        $response = Http::get('http://localhost/NT-Ecommerce/public/api/getUser');
        // Kiểm tra nếu yêu cầu thành công
        if($response->successful()){
            // Lấy dữ liệu từ phản hồi của API
            $accounts = $response->json();
            // var_dump($data);
            // Truyền dữ liệu tới view
            return view('admin.account.indexAPI', ['accounts' => $accounts]);
        }
        else {
            // Xử lý khi yêu cầu không thành công
            return view('admin.account.indexAPI', ['error' => 'Unable to fetch data from API']);
        }
    }
}
