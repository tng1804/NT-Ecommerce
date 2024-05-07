<!doctype html>
<html lang="en">

<head>
    <title>NT-Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @yield('table')
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('click_home')" href="{{ route('admin.index') }}">Home</a>
                </li>
                {{-- active --}}
                <li class="nav-item">
                    <a class="nav-link @yield('click_category')" href="{{ route('category.index') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('click_product')" href="{{ route('product.index') }}">Product</a>
                </li>
                <li class="nav-item">
                    @yield('nameAdmin')
                </li>
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link " href="#">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin.logout') }}">Đăng xuất</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin.login') }}">Đăng nhập</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('main')
    </div>

    <!------ Include the above in your HEAD tag ---------->

    


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
    <script>
        function updateFileName() {
            var input = document.getElementById('inputGroupFile01');
            var label = document.getElementById('custom-file-label');
            var fileName = input.files[0].name;
            label.innerText = fileName;
        }
    </script>
</body>

</html>
