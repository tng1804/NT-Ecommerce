@extends('main')
@section('main')
    <div class="row">
        <div class="thumbnail">
            <form action="{{route('home.postCart', $product->id)}}" method="POST">
                @csrf
                <div class="col-md-6">
                    <img src="{{ asset('assets/img/' . $product->image) }}" alt="" style="width:100%">
                </div>
                <div class="col-md-6">
                    <div class="caption">
                        <h3>
                            {{ $product->name }}
                        </h3>
                        <p>
                            Kho: {{ $product->quantity }}
                        </p>
                        <p>
                            Price: {{ $product->price }} đ
                        </p>
                        <p>
                            NT-Ecommerce
                        </p>
                        <p>
                            Số lượng: <input type="number" name="quantity" id="quantity" value="0" min="0"
                                max="100">
                                {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
                                <input type="hidden" name="price" value="{{$product->price}}">
                        </p>
                        <p>
                            <button class="btn btn-primary btn-sm">Add to cart</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                <h4 class="media-heading">
                    {{ $comm->user->name }}

                </h4>
                <p>{{ $comm->content }}</p>
                <small>{{ $comm->created_at->format('d/m/Y') }}</small>
                @can('my-comment', $comm)
                    <p class="text-right">
                        <a href="" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="" class="btn btn-danger btn-sm">Xóa</a>

                    </p>
                @endcan
            </div>
        </div>
        <hr>
    @endforeach
@stop()
