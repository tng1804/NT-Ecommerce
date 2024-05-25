@extends('main')
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet" />
{{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> --}}
<script src="https://kit.fontawesome.com/25801ad5d5.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/yourcode.js"></script>

<!-- Bootstrap -->
{{-- <link type="text/css" rel="stylesheet" href="{{asset('assets/css/about/bootstrap.min.css')}}" /> --}}

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/about/slick.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/about/slick-theme.css')}}" />

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/about/nouislider.min.css')}}" />

<!-- Font Awesome Icon -->
{{-- <link rel="stylesheet" href="{{asset('assets/css/about/font-awesome.min.css')}}" /> --}}

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/about/style.css')}}" />
<!-- Section -->
<div id="top" style="margin-top: 100px; margin-bottom: 90px"></div>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row" style="margin-bottom: 60px">
            <div class="col-md-6">
                <div style="margin-top: 70px">
                    <h1 style="font-size: 40px">Giới thiệu về NT-Ecommerce</h1>
                    <p>
                        Ra mắt vào năm 2024, NT-Ecommerce là trang web trực tuyến hàng đầu Đông Nam Á
                        nơi mua sắm có sự hiện diện tích cực ở Việt Nam.
                        Được hỗ trợ bởi nhiều hoạt động tiếp thị, dữ liệu và dịch vụ phù hợp
                        giải pháp, có 10.500 người bán và 300 nhãn hiệu và
                        phục vụ 3 triệu khách hàng trên toàn khu vực.
                    </p>
                    <p>
                        NT-Ecommerce có hơn 1 triệu sản phẩm để cung cấp, tăng trưởng ở mức
                        rất nhanh. Độc quyền cung cấp nhiều loại tài sản đa dạng
                        khác nhau từ người tiêu dùng.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('assets/img/about.jpg')}}" alt="" style="width: 550px; height: 550px" />
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="order-summary text-center" style="border: 1px solid black; padding: 15px; margin: 20px">
                    <div class="product-btns" style="margin-bottom: 20px">
                        <button class="btn-round" style="background-color: #000">
                            <i class="fa fa-home"></i>
                        </button>
                    </div>
                    <h2>10.5K</h2>
                    <p>Saller active our site</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="order-summary text-center"
                    style="
                border: 1px solid black;
                padding: 15px;
                margin: 20px;
                background-color: #db4444;
              ">
                    <div class="product-btns" style="margin-bottom: 20px">
                        <button class="btn-round" style="background-color: #000">
                            <i class="fa fa-dollar"></i>
                        </button>
                    </div>
                    <h2 style="color: white">33K</h2>
                    <p style="color: white">Saller active our site</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="order-summary text-center" style="border: 1px solid black; padding: 15px; margin: 20px">
                    <div class="product-btns" style="margin-bottom: 20px">
                        <button class="btn-round" style="background-color: #000">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                    <h2>45.5K</h2>
                    <p>Saller active our site</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="order-summary text-center" style="border: 1px solid black; padding: 15px; margin: 20px">
                    <div class="product-btns" style="margin-bottom: 20px">
                        <button class="btn-round" style="background-color: #000">
                            <i class="fa fa-euro"></i>
                        </button>
                    </div>
                    <h2>25K</h2>
                    <p>Saller active our site</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="image-container">
                    <img class="profile-pic" src="{{asset('assets/img/profile1.png')}}" alt="" />
                </div>
                <h2>Tom Cruise</h2>
                <p>Người sáng lập & Chủ tịch</p>
                <p>
                    <a href="#"><i class="fa fa-twitter fa-2x" style="margin-right: 10px"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-2x" style="margin-right: 10px"></i></a>
                    <a href="#"><i class="fa fa-linkedin fa-2x" style="margin-right: 10px"></i></a>
                </p>
            </div>
            <div class="col-md-4">
                <div class="image-container">
                    <img class="profile-pic" src="{{asset('assets/img/profile2.png')}}" alt="" />
                </div>
                <h2>Emma Watson</h2>
                <p>Giám đốc điều hành</p>
                <p>
                    <a href="#"><i class="fa fa-twitter fa-2x" style="margin-right: 10px"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-2x" style="margin-right: 10px"></i></a>
                    <a href="#"><i class="fa fa-linkedin fa-2x" style="margin-right: 10px"></i></a>
                </p>
            </div>
            <div class="col-md-4">
                <div class="image-container">
                    <img class="profile-pic" src="{{asset('assets/img/profile3.png')}}" alt="" />
                </div>
                <h2>Will Smith</h2>
                <p>Quản lý sản xuất</p>
                <p>
                    <a href="#"><i class="fa fa-twitter fa-2x" style="margin-right: 10px"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-2x" style="margin-right: 10px"></i></a>
                    <a href="#"><i class="fa fa-linkedin fa-2x" style="margin-right: 10px"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- /section -->

<!-- section -->
<div class="section" style="margin-bottom: 40px">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="product-btns" style="margin-bottom: 20px">
                    <button class="btn-fa">
                        <i class="fa fa-truck fa-2x"></i>
                    </button>
                </div>
                <h4>GIAO HÀNG MIỄN PHÍ</h4>
                <p>Giao hàng miễn phí cho tất cả đơn hàng</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="product-btns" style="margin-bottom: 20px">
                    <button class="btn-fa">
                        <i class="fa fa-headphones fa-2x"></i>
                    </button>
                </div>
                <h4>DỊCH VỤ KHÁCH HÀNG 24/7</h4>
                <p>Hỗ trợ khách hàng thân thiện 24/7</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="product-btns" style="margin-bottom: 20px">
                    <button class="btn-fa">
                        <i class="fa fa-shield fa-2x"></i>
                    </button>
                </div>
                <h4>ĐẢM BẢO HOÀN TIỀN</h4>
                <p>Chúng tôi trả lại tiền trong vòng 7 ngày</p>
            </div>
        </div>
    </div>
</div>
<!-- /section -->
<!-- jQuery Plugins -->
<script src="{{asset('assets/js/about/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/about/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/about/slick.min.js')}}"></script>
<script src="{{asset('assets/js/about/nouislider.min.js')}}"></script>
<script src="{{asset('assets/js/about/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/js/about/main.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".size-btn").click(function() {
            $(".size-btn").removeClass("selected");
            $(this).addClass("selected");
        });

        $(".color-btn").click(function() {
            $(".color-btn").removeClass("selected");
            $(this).addClass("selected");
        });
    });
</script>
