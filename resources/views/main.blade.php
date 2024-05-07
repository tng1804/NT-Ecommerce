<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <title>NT-Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
</head>

<body>
    <header class="navbar navbar-expand navbar-dark bg-dark fixed-top">

        <div class="container">
            <ul class="nav navbar-nav">
                {{-- active --}}
                {{-- <li class="nav-item">
                    <a class="brand" href="#"><img class="brand-logo-light"
                            src="{{ asset('assets') }}/img/logo02.jpg" alt="" width="40" height="40"
                            srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link @yield('click_product')" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('click_comment')" href="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('click_comment')" href="">Contact</a>
                </li>



                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link @yield('click_product')" href="#">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('click_product')" href="{{ route('home.logout') }}">Đăng xuất</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link @yield('click_product')" href="{{ route('home.login') }}">Đăng nhập</a>
                    </li>
                @endif

            </ul>
            <form class="form-inline" action="{{ route('home.search') }}" method="POST">
                @csrf
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Bạn cần tìm gì ?"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                <a class="nav-link" href="{{route('home.cart')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-cart2" viewBox="0 0 16 16">
                        <path
                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                    </svg>

                    <strong>{{ $total_cart_records }}</strong>

                </a>
            </form>


        </div>
    </header>

    <div class="container content-body" style="margin-top: 100px; margin-bottom: 100px">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Danh mục sản phẩm
                        </h4>
                    </div>
                    <div class="list-group">
                        {{-- <ul class="list-group"> --}}
                        @foreach ($cats_home as $cat)
                            {{-- <li class="list-group-item"> --}}
                            <a
                                href="{{ route('home.category', $cat->id) }}"class="list-group-item">{{ $cat->name }}</a>
                            {{-- </li> --}}
                        @endforeach
                        {{-- </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('main')
            </div>
        </div>
    </div>

    <footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="container">
            <div class="row row-30 margin-top-footer">
                <div class="col-md-4 col-xl-5">
                    <div class="pr-xl-4"><a class="brand" href="#"><img class="brand-logo-light"
                                src="{{ asset('assets') }}/img/logo02.jpg" alt="" width="90" height="90"
                                srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                        <p>We are an award-winning creative agency, dedicated to the best result in web design,
                            promotion, business consulting, and marketing.</p>
                        <!-- Rights-->
                        <p class="rights"><span>©  </span><span
                                class="copyright-year">2024</span><span> </span><span>Waves</span><span>. </span><span>All
                                Rights Reserved.</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Contacts</h5>
                    <dl class="contact-list">
                        <dt>Address:</dt>
                        <dd>111 Triều Khúc, Thanh Xuân, Hà Nội</dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>email:</dt>
                        <dd><a href="mailto:#">tng1804@gmail.com</a></dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>phones:</dt>
                        <dd><a href="tel:#">https://tng1804.com</a> <span>or</span> <a
                                href="tel:#">https://tng1804.com</a>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-4 col-xl-3">
                    <h5>Links</h5>
                    <ul class="nav-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row no-gutters social-container">
            <div class="col"><a class="social-inner" href="#"><span
                        class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
            <div class="col"><a class="social-inner" href="#"><span
                        class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
            <div class="col"><a class="social-inner" href="#"><span
                        class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
            <div class="col"><a class="social-inner" href="#"><span
                        class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
        </div>
    </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
