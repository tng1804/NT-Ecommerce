@extends('main')
{{-- @section('main') --}}
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
<div id="top" style="margin-top: 130px; margin-bottom: 100px"></div>
<div class="container px-3 my-5 clearfix" style="margin-top: 100px; margin-bottom: 60px">

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
                        <input type="hidden" value="{{ $item }}">
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
                                                <span class="text-muted">Ships from: </span> HaNoi
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4">
                                    {{ $item->product->price }}đ</td>
                                <td class="align-middle p-4">
                                    <input type="number" id="quantity_{{ $item->id }}"
                                        class="form-control text-center" min="1"
                                        max="{{ $item->product->quantity }}" value="{{ $item->quantity }}"
                                        onchange="updateCartItem({{ $item->id }})">
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4"
                                    id="subtotal_{{ $item->id }}">
                                    {{ $item->quantity * $item->price }}đ</td>
                                <form action="{{ route('home.deleteCart', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td class="text-center align-middle px-0">
                                        {{-- <a href="#"
                                            class="shop-tooltip close float-none text-danger" title
                                            data-original-title="Remove">×</a> --}}
                                        <button type="submit"
                                            class="shop-tooltip close float-none text-danger">×</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        @if ($cart_list_items->count() > 0)
                        <tr>
                            <td>
                                <h5 style="text-align: center">Clear all</h5>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <form action="{{ route('home.deleteCartAll') }}" method="GET">
                                @csrf
                                {{-- @method('DELETE') --}}
                                <td class="text-center align-middle px-0">
                                    {{-- <a href="#"
                                        class="shop-tooltip close float-none text-danger" title
                                        data-original-title="Remove">×</a> --}}
                                    <button type="submit" class="shop-tooltip close float-none text-danger">×
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @else
                        {{-- <p>Hãy quay lại và thêm sản phẩm vào giỏ hàng nhé !</p> --}}
                        @endif
                        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                        <script>
                            // Kiểm tra xem có sản phẩm nào còn trong giỏ hàng không
                            function updateCartItem(itemId) {
                                var quantity = document.getElementById('quantity_' + itemId).value;

                                // Gửi yêu cầu cập nhật số lượng sản phẩm thông qua Ajax
                                axios.put('/cart/update/' + itemId, {
                                        quantity: quantity
                                    })
                                    .then(function(response) {
                                        var updatedCartItem = response.data.cartItem;
                                        var subtotalElement = document.getElementById('subtotal_' + itemId);

                                        // Kiểm tra tồn tại của phần tử trước khi cập nhật
                                        if (subtotalElement) {
                                            subtotalElement.innerText = updatedCartItem.quantity * updatedCartItem.price + 'đ';
                                        } else {
                                            console.error('Subtotal element not found');
                                        }

                                        // Cập nhật tổng giá tiền của toàn bộ giỏ hàng nếu cần
                                        var totalPriceElement = document.getElementById('total-price');
                                        if (totalPriceElement) {
                                            totalPriceElement.innerText = response.data.totalPrice + 'đ';
                                        } else {
                                            console.error('Total price element not found');
                                        }
                                    })
                                    .catch(function(error) {
                                        // Xử lý lỗi và thông báo cho người dùng
                                        console.error(error);
                                        alert('Có lỗi xảy ra khi cập nhật giỏ hàng. Vui lòng thử lại sau.');
                                    });
                            }
                        </script>

                        {{-- <script>
                                // Gắn sự kiện onchange cho một phần tử input
                                var inputs = document.querySelectorAll('input[type="number"]');
                                inputs.forEach(function(input) {
                                    input.addEventListener('change', function() {
                                        // Thực hiện hành động khi giá trị của phần tử thay đổi
                                        console.log("Giá trị mới của input là: " + this.value);
                                        // Thực hiện các hành động khác tùy thuộc vào giá trị mới
                                        var itemId = this.id.split('_')[1];
                                        updateCartItem(itemId);
                                    });
                                });
                            </script> --}}

                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="mt-4">
                    <label class="text-muted font-weight-normal">Promocode</label>
                    <input type="text" placeholder="ABC" class="form-control">
                </div>
                {{-- <div class="mt-4">
                        <label class="text-muted font-weight-normal">Clear</label>
                        <input type="submit" value="x"></input>
                    </div> --}}
                <div class="d-flex">
                    <div class="text-right mt-4 mr-5">
                        <label class="text-muted font-weight-normal m-0">Toltal product</label>
                        <div class="text-large"><strong>{{ count($cart_list_items) }}</strong></div>
                    </div>
                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">Total price</label>
                        <div id="total-price" class="text-large"><strong>{{ $toltal_price }} đ</strong></div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <a class="btn btn-outline-secondary" href="/" role="button">Back to shopping</a>
                @if (count($cart_list_items) > 0)
                    <a class="btn btn-outline-primary" href="{{ route('order.checkout') }}" role="button">Checkout</a>
                @else
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>

<script>
    // Gắn sự kiện onchange cho một phần tử input
    var inputElement = document.getElementById("quantity_".{{ $item->id }});

    inputElement.onchange = function() {
        // Thực hiện hành động khi giá trị của phần tử thay đổi
        console.log("Giá trị mới của input là: " + this.value);
        // Thực hiện các hành động khác tùy thuộc vào giá trị mới
    };
</script>

{{-- @stop() --}}
