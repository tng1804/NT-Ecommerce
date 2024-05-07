@extends('main')
@section('main')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <div class="container px-3 my-5 clearfix">

        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>

                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                        class="shop-tooltip float-none text-light" title data-original-title="Clear cart"><i
                                            class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" value="{{ $toltal_price = 0 }}">
                            @foreach ($cart_list_items as $item)
                                <input type="hidden" value="{{ $toltal_price += $item->quantity * $item->price }}">
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('assets/img/' . $item->product->image) }}"
                                                class="d-block ui-w-40 ui-bordered mr-4" alt>
                                            <div class="media-body">
                                                <a href="{{ route('home.product', $item->product_id) }}"
                                                    class="d-block text-dark">{{ $item->product->name }}</a>
                                                <small>
                                                    <span class="text-muted">Color:</span>
                                                    <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                                        style="background:#e81e2c;"></span> &nbsp;
                                                    <span class="text-muted">Size: </span> EU 37 &nbsp;
                                                    <span class="text-muted">Ships from: </span> China
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        {{ $item->product->price }}đ</td>
                                    <td class="align-middle p-4">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $item->quantity }}">
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        {{ $item->quantity * $item->price }}đ</td>
                                    <form action="" method="POST">
                                        <td class="text-center align-middle px-0">
                                            {{-- <a href="#"
                                            class="shop-tooltip close float-none text-danger" title
                                            data-original-title="Remove">×</a> --}}
                                            <button type="submit" class="shop-tooltip close float-none text-danger">×</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal">Promocode</label>
                        <input type="text" placeholder="ABC" class="form-control">
                    </div>
                    <div class="d-flex">
                        <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">Toltal quantity</label>
                            <div class="text-large"><strong>{{ count($cart_list_items) }}</strong></div>
                        </div>
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large"><strong>{{$toltal_price}} đ</strong></div>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3"><a href="/">Back to shopping</a></button>
                    <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
@stop()
