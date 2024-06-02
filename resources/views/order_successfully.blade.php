@extends('main')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/NT.png') }}" />
    <div id="top" style="margin-top: 130px; margin-bottom: 100px"></div>
    <div class="container-fluid">
        <div class="container text-center">
            <h1>Thank you.</h1>
            <p class="lead w-lg-50 mx-auto">Đơn hàng của bạn đã được đặt hàng thành công.</p>
            <p class="w-lg-50 mx-auto">Mã đơn hàng của bạn là <a href="{{route('order.detail',$orderId)}}">{{ $orderId }}</a>. Chúng tôi sẽ xử
                lý ngay lập tức của bạn và nó sẽ được giao sau 2 - 5 ngày làm việc.</p>
        </div>
        <div class="container">
            <h2 class="h5 mb-5 text-center">Có thể bạn cũng thích những sản phẩm này</h2>
            <div class="row">
                {{-- <div class="col-lg-3">
                    <div class="card text-center mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/6495ED/000000" alt class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#"
                                    class="stretched-link text-reset">Smartphone 5G Black 12GB RAM+512GB NEW</a></h3>
                            <span class="text-success">$799.00</span> <del class="text-muted">$650.83</del>
                        </div>
                        <div
                            class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">10%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div> --}}
                @foreach ($products as $product)
                    <div class="col-lg-3">
                        <div class="card text-center position-relative mb-3">
                            <div class="py-5 px-4">
                                <img src="{{asset('assets/img/'.$product->image)}}" alt
                                    class="img-fluid mb-4" />
                                <h3 class="fs-6 text-truncate"><a href="{{ route('home.product',$product->id) }}"
                                        class="stretched-link text-reset">{{$product->name}}</a></h3>
                                <span class="text-success">{{$product->price}} đ</span> <del class="text-muted">{{$product->price + 200000}} đ</del>
                            </div>
                            <div
                                class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                                <span class="d-block">25%</span>
                                <span class="d-block">OFF</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3">
                    <div class="card text-center mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/008B8B/000000" alt class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#"
                                    class="stretched-link text-reset">Smartwatch IP68 Waterproof GPS and Bluetooth
                                    Support</a></h3>
                            <span class="text-success">$29.00</span> <del class="text-muted">$14.50</del>
                        </div>
                        <div
                            class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">50%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center mb-3">
                        <div class="py-5 px-4">
                            <img src="https://www.bootdey.com/image/280x280/00CED1/000000" alt class="img-fluid mb-4" />
                            <h3 class="fs-6 text-truncate"><a href="#" class="stretched-link text-reset">Men's
                                    Running Shoes</a></h3>
                            <span class="text-success">$110.00</span> <del class="text-muted">$85.23</del>
                        </div>
                        <div
                            class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                            <span class="d-block">25%</span>
                            <span class="d-block">OFF</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

