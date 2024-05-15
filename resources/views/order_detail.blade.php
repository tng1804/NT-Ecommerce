@extends('main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/order_detail.css') }}">
<div id="top" style="margin-top: 90px; margin-bottom: 70px"></div>
<div class="container-fluid">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Chi tiết đơn hàng: #{{ $order->id }}</h2>
        </div>

        <div class="row">
            <div class="col-lg-8">

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3">{{ $order->created_at->format('d/m/Y H:i:s') }}</span>
                                <span class="me-3">#{{ $order->id }}</span>
                                <span class="me-3">{{$order->name}}</span>
                                <span class="badge rounded-pill bg-info">SHIPPING</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                        class="bi bi-download"></i> <span class="text">Hóa đơn</span></button>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 text-muted" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical">+</i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i>
                                                Edit</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i>
                                                Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                @foreach ($order_products as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="{{asset('assets/img/'.$item->product->image)}}" alt
                                                        width="50" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0"><a href="#" class="text-reset">{{$item->product->name}}</a></h6>
                                                    <span class="small">Màu: Black</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$item->quantity}}</td>
                                        <td class="text-end">{{$item->price}} đ</td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0">
                                                <img src="https://www.bootdey.com/image/280x280/FF69B4/000000" alt
                                                    width="35" class="img-fluid">
                                            </div>
                                            <div class="flex-lg-grow-1 ms-3">
                                                <h6 class="small mb-0"><a href="#" class="text-reset">Smartwatch
                                                        IP68 Waterproof GPS and Bluetooth Support</a></h6>
                                                <span class="small">Color: White</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td class="text-end">$79.99</td>
                                </tr> --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Tổng tiền hàng</td>
                                    <td class="text-end">{{$subTotal}} đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Tổng tiền phí vận chuyển</td>
                                    <td class="text-end">0 đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Giảm giá (Code: NEWYEAR)</td>
                                    <td class="text-danger text-end">- 0 đ</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">TỔNG THANH TOÁN</td>
                                    <td class="text-end">{{$subTotal}} đ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Hình thức thanh toán</h3>
                                <p>Thanh toán khi nhận hàng<br>
                                    Tổng thanh toán: {{$subTotal}} đ <span class="badge bg-success rounded-pill">PAID</span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Địa chỉ nhận hàng</h3>
                                <address>
                                    <strong>{{$order->name}}</strong><br> {{$order->address}}
                                    {{-- <br>San Francisco, CA 94103 --}}<br>
                                    <abbr title="Phone">Số điện thoại:</abbr> {{$order->phone}}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6">Ghi chú khách hàng</h3>
                        <p>Tôi có thể nhận vào khoảng 2h->4h chiều.</p>
                    </div>
                </div>
                <div class="card mb-4">

                    <div class="card-body">
                        <h3 class="h6">Thông tin vận chuyển</h3>
                        <strong>Mã vận chuyển</strong>
                        <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                                class="bi bi-box-arrow-up-right"></i> </span>
                        <hr>
                        <h3 class="h6">Địa chỉ</h3>
                        <address>
                            <strong>{{$order->name}}</strong><br>
                            {{$order->address}}<br>
                            {{-- San Francisco, CA 94103<br> --}}
                            <abbr title="Phone">Số điện thoại:</abbr> {{$order->phone}}
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>
