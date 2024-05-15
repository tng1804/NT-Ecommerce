@extends('main')
@section('slidebar')
    @include('includes.slidebar')
@endsection
@section('main')
    {{-- <div class="row"> --}}
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        <div class="thumbnail">
            <h3 style="text-align: center">Thông tin chi tiết sản phẩm</h3>
            <br>
            <form action="{{ route('home.postCart', $product->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 order-md-1">
                        <img src="{{ asset('assets/img/' . $product->image) }}" alt="" style="width:100%">
                    </div>
                    <div class="col-md-6 order-md-2">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>Kho: {{ $product->quantity }}</p>
                            <p>Price: {{ $product->price }} đ</p>
                            <p>NT-Ecommerce</p>
                            <p>Số lượng: <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->quantity }}"></p>
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            @if (auth()->check())
                                <button class="btn btn-primary btn-sm">Add to cart</button>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    <strong>Đăng nhập để mua hàng.</strong> Click vào đây để <a href="{{ route('home.login') }}">Đăng nhập</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    {{-- </div> --}}
    <hr>
    <h3>Comments</h3>
    @if (auth()->check())
        <form action="{{ route('home.comment', ['product_id' => $product->id]) }}" method="POST" role="form">
            @csrf
            <div class="form-group">
                <textarea name="content" id="content" class="form-control" cols="110" rows="5"
                    placeholder="Nội dung bình luận"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>

        </form>
    @else
        <div class="alert alert-danger" role="alert">
            <strong>Đăng nhập để bình luận.</strong> Click vào đây để <a href="{{ route('home.login') }}">Đăng nhập</a>
        </div>
    @endif
    <hr>
    @foreach ($comments as $comm)
        <div class="media">
            <a href="" class="pull-left">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="" class="media-object" width="50%">
            </a>
            <div class="media-body">
                <h5 class="media-heading">
                    @if (auth()->user()->name == $comm->user->name)
                        You
                    @else
                        {{ $comm->user->name }}
                    @endif
                </h5>
                <p>{{ $comm->content }}</p>
                <small>{{ $comm->created_at->format('d/m/Y') }}</small>
                @can('my-comment', $comm)
                    <p class="text-right">
                        {{-- <a href="" class="btn btn-primary btn-sm">Sửa</a> --}}
                        <a href="{{ route('home.deleteComment', $comm->id) }}" class="btn btn-danger btn-sm">Xóa</a>

                    </p>
                @endcan
            </div>
        </div>
        <hr>
    @endforeach
@stop()
