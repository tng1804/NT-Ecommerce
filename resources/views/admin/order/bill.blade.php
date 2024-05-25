<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/bill.css')}}">
<div class="container">
    <div class="row">

        <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-xs-12">
                                {{-- <img src="http://vergo-kertas.herokuapp.com/assets/img/logo.png" alt height="35"> --}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2>Hóa đơn<br>
                                    <span class="small">Mã hóa đơn: {{ $order->id }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Đến:</strong><br>
                                {{ $order->name }}<br>
                                {{-- {{$order->email}}<br> --}}
                                {{ $order->address }}<br>
                                <abbr title="Phone">P:</abbr> {{ $order->phone }}
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Từ:</strong><br>
                                NT-Ecommerce<br>
                                Số 54 Triều Khúc<br>
                                Thanh Xuân, Hà Nội<br>
                                <abbr title="Phone">P:</abbr> +84 1234 1234
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Hình thức thanh toán:</strong><br>
                                Thanh toán khi nhận hàng<br>
                                {{-- <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="0d652368616c6463684d6a606c6461236e6260">[email&#160;protected]</a><br> --}}
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Ngày đặt hàng:</strong><br>
                                {{ $order->created_at }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>NỘI DUNG HÀNG (Tổng SL sản phẩm: {{ $order_products->count() }})</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="line">
                                        <td><strong>#</strong></td>
                                        <td class="text-center"><strong>SẢN PHẨM</strong></td>
                                        <td class="text-center"><strong>SL</strong></td>
                                        <td class="text-right"><strong>GIÁ</strong></td>
                                        <td class="text-right"><strong>TỔNG TIỀN</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_products as $order_product)
                                        <tr>
                                            <td>{{ $order_product->product_id }}</td>
                                            <td><strong>{{ $order_product->product->name }}</strong><br>{{ $order_product->product->content }}.
                                            </td>
                                            <td class="text-center">{{ $order_product->quantity }}</td>
                                            <td class="text-right">{{ $order_product->price }} đ</td>
                                            <td class="text-right">
                                                {{ $order_product->quantity * $order_product->price }} đ</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="text-right"><strong>Phí vận chuyển</strong></td>
                                    <td class="text-right"><strong>0 đ</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                    </td>
                                    <td class="text-right"><strong>Tiền thu người nhận</strong></td>
                                    <td class="text-right"><strong>{{$subTotal}} đ</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right identity">
                            <p>Chữ ký người nhận<br><strong>..............................</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
