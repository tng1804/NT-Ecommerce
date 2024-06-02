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
                <a class="nav-link @yield('click_comment')" href="{{ route('home.about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('click_comment')" href="{{route('home.contact')}}">Contact</a>
            </li>



            @if (auth()->check())
                <li class="nav-item">
                    {{-- <a class="nav-link @yield('click_product')" href="#">{{ auth()->user()->name }}</a> --}}
                    <!-- Example split danger button -->
                    <div class="dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            {{-- <a class="dropdown-item" href="#">My account</a> --}}
                            <a class="dropdown-item" href="{{route('home.myOrder')}}">My orders</a>
                            <a class="dropdown-item" href="{{route('home.showChangePasswordForm',auth()->user()->id)}}">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="{{ route('home.logout') }}">Logout</a>
                          </div>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link @yield('click_product')" href="{{ route('home.logout') }}">Đăng xuất</a>
                </li> --}}
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

            <a id="icon_cart" class="nav-link"
                href="{{ route('home.cart') }}"style="color: rgba(255, 255, 255, .75);transition: color 0.3s;"
                onmouseover="this.style.color='rgba(255, 255, 255, 0.5)'"
                onmouseout="this.style.color='rgba(255, 255, 255, .75)'">
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
