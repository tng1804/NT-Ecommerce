@extends('main')
@section('slidebar')
    @include('includes.slidebar')
@endsection
@section('main')
    <div class="row">
        @foreach ($products as $prod)
            <a href="{{ route('home.product', $prod->id) }}" id="a-product">
                <div class="col-md-4 col-lg-4" style="margin-top: 10px; margin-bottom: 10px">
                    <div class="thumbnail" style="border: 1px solid #989696; padding:10px;">
                        <img src="{{ asset('assets/img/' . $prod->image) }}" class="img-thumbnail" alt=""
                            onerror="this.onerror=null;this.src='{{ asset('assets') }}/img/images/logo.jpg';">
                        {{-- C:\xampp\htdocs\NT-Ecommerce\resources\images\butchi.png --}}
                        <div class="caption">
                            <h4>{{ $prod->name }}</h4>
                            <p>
                                Kho: {{ $prod->quantity }}
                            </p>
                            <p>
                                Giá: {{ $prod->price }} đ
                            </p>
                            {{-- <p>
                                NT_Ecommerce
                            </p> --}}
                            <p>
                                <a class="btn btn-outline-secondary btn-block btn-click"
                                    href="{{ route('home.product', $prod->id) }}">Xem chi
                                    tiết</a>

                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
@stop()

<style>
    #a-product {
        color: black;
        text-decoration: none;

    }

    #a-product:hover {
        border-color: blue;
    }
</style>
