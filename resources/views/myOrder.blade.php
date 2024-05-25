@extends('main')
<title>My orders</title>
<link rel="stylesheet" href="{{ asset('assets/css/myOrder.css') }}">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div id="top" style="margin-top: 90px; margin-bottom: 70px"></div>
<div class="container bootdey">
    <div class="card  panel-order">
        <div class="card-header">
            <strong>DANH SÁCH ĐƠN HÀNG</strong>
            <div class="btn-group float-right">
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                        data-toggle="dropdown">Filter history <i class="fa fa-filter"></i></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#">Approved orders</a></li>
                        <li><a href="#">Pending orders</a></li>
                    </ul>
                </div> --}}
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Lựa
                        chọn<i class="fa fa-filter"></i></button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a class="dropdown-item" href="#">Chờ xử lý</a></li>
                        <li><a class="dropdown-item" href="#">Chờ giao hàng</a></li>
                        <li><a class="dropdown-item" href="#">Đã hủy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body">
            @php
                $i = 1;
            @endphp
            @foreach ($orders as $order)
                <div class="row">
                    <div class="col-md-1">
                        {{-- <img src="https://bootdey.com/img/Content/user_3.jpg"
                            class="media-object img-thumbnail" /> --}}
                        <label class="media-object img-thumbnail" for="">{{ $i }}</label>
                        @php
                            $i++;
                        @endphp
                    </div>
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    @switch($order->status)
                                        @case(0)
                                            <span class="badge badge-info badge-pill">Chờ xử lý </span>
                                        @break

                                        @case(1)
                                            <span class="badge badge-success badge-pill">Đã xác nhận</span>
                                        @break

                                        @case(2)
                                            <span class="badge badge-success badge-pill">Đang xử lý</span>
                                        @break

                                        @case(3)
                                            <span class="badge badge-success badge-pill">Đã xuất kho</span>
                                        @break

                                        @case(4)
                                            <span class="badge badge-success badge-pill">Đang giao hàng</span>
                                        @break

                                        @case(5)
                                            <span class="badge badge-success badge-pill">Giao hàng thành công</span>
                                        @break

                                        @case(6)
                                            <span class="badge badge-danger badge-pill">Đã hủy</span>

                                            @default
                                        @endswitch
                                    </div>
                                    {{-- <span class="badge rounded-pill bg-info">SHIPPING</span> --}}
                                    @foreach ($order_details as $order_detail)
                                        @if ($order->id == $order_detail->order_id)
                                            <span><strong>Mã đơn hàng: </strong></span> <span
                                                class="badge badge-primary badge-pill">{{ $order->id }}</span><br />
                                            Số lượng sản phẩm : {{ $order_detail->total_quantity }}, Tổng tiền:
                                            {{ $order_detail->total_price }} đ<br />
                                        @endif
                                    @endforeach
                                    {{-- <a data-placement="top" class="btn btn-success btn-sm glyphicon glyphicon-ok"
                                    href="{{ route('order.detail', $order->id) }}" title="View"></a>
                                <a data-placement="top" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
                                    href="#" title="Danger"></a>
                                <a data-placement="top" class="btn btn-info btn-sm glyphicon glyphicon-usd"
                                    href="#" title="Danger"></a> --}}
                                    <a data-placement="top" class="btn btn-info btn-sm"
                                        href="{{ route('order.detail', $order->id) }}" title="Chi tiết đơn hàng">
                                        <i class="fas fa-info-circle"></i> <!-- Sử dụng font-awesome để thêm biểu tượng -->
                                    </a>
                                    @if ($order->status >= 0 && $order->status <= 2)
                                        <form action="{{ route('myOrder.cancelOrder', $order->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm" data-placement="top"
                                                title="Hủy đơn hàng">
                                                <i class="fas fa-ban"></i>
                                                {{-- <i class="fas fa-times-circle"></i> --}}
                                            </button>
                                        </form>
                                    @endif
                                    {{-- <a data-placement="top" class="btn btn-info btn-sm" href="#" title="Thanh toán">
                                        <i class="fas fa-dollar-sign"></i> <!-- Sử dụng font-awesome để thêm biểu tượng -->
                                    </a> --}}
                                </div>
                                <div class="col-md-12 custom-col-md-12">Thời gian đặt hàng:
                                    {{ $order->created_at->format('d/m/Y H:i:s') }}</div>
                            </div>
                            <style>
                                .custom-col-md-12 {
                                    width: 800px !important;
                                }
                            </style>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">Hãy <a href="{{ route('home.contact') }}">liên hệ</a> ngay với chúng tôi khi bạn cần
                giúp đỡ!</div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
