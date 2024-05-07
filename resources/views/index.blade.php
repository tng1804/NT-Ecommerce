@extends('main')
@section('main')
    <div class="row">
        @foreach ($products as $prod)
            <div class="col-md-4 col-lg-4" style="margin-top: 10px; margin-bottom: 10px">
                <div class="thumbnail" style="border: 1px solid #989696; padding:10px;" >
                    <img src="{{ asset('assets/img/' . $prod->image) }}" class="img-thumbnail" alt="" 
                    onerror="this.onerror=null;this.src='{{asset('assets')}}/img/images/logo.jpg';">
                    {{-- C:\xampp\htdocs\NT-Ecommerce\resources\images\butchi.png --}}
                    <div class="caption">
                        <h3>{{$prod->name}}</h3>
                        <p>
                            Kho: {{$prod->quantity}}
                        </p>
                        <p>
                            Price: {{$prod->price}}
                        </p>
                        <p>
                            NT_Ecommerce
                        </p>
                        <a href="{{route('home.product', $prod->id)}}" class="btn btn-click btn-block" >Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@stop()

<div>
    <img src="" alt="">
</div>