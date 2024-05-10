@extends('main')
<div class="custom-icons">
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    {{-- @include('includes.header') --}}
    <link scoped rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div id="top" style="margin-top: 130px; margin-bottom: 100px"></div>
    <div class="container2" style="margin: 0px 100px">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <ol class="activity-checkout mb-0 px-4 mt-3">
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-receipt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Billing Info</h5>
                                            <p class="text-muted text-truncate mb-4">Nhập thông tin địa chỉ
                                            </p>
                                            <div class="mb-3">
                                                <form>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="billing-name">Name</label>
                                                                    <input name="name" type="text"
                                                                        class="form-control" id="billing-name"
                                                                        placeholder="Enter name"
                                                                        value="{{ $auth->name }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="billing-email-address">Email
                                                                        Address</label>
                                                                    <input name="email" type="email"
                                                                        class="form-control" id="billing-email-address"
                                                                        placeholder="Enter email"
                                                                        value="{{ $auth->email }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="billing-phone">Phone</label>
                                                                    <input name="phone" type="text"
                                                                        class="form-control" id="billing-phone"
                                                                        placeholder="Enter Phone no."
                                                                        value="{{ $auth->phone }}"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="billing-address">Address</label>
                                                            <textarea name="address" class="form-control" id="billing-address" rows="3" placeholder="Enter full address"
                                                                value = "{{ $auth->address }}" required></textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-4 mb-lg-0">
                                                                    <label class="form-label">Country</label>
                                                                    <select class="form-control form-select"
                                                                        title="Country">
                                                                        <option value="0">Select Country</option>
                                                                        <option value="VN">VietNam</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option>
                                                                        <option value="AS">American Samoa</option>
                                                                        <option value="AD">Andorra</option>
                                                                        <option value="AO">Angola</option>
                                                                        <option value="AI">Anguilla</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-4 mb-lg-0">
                                                                    <label class="form-label"
                                                                        for="billing-city">City</label>
                                                                    <input type="text" class="form-control"
                                                                        id="billing-city" placeholder="Enter City">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-0">
                                                                    <label class="form-label" for="zip-code">Zip /
                                                                        Postal
                                                                        code</label>
                                                                    <input type="text" class="form-control"
                                                                        id="zip-code" placeholder="Enter Postal code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-truck text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                            <p class="text-muted text-truncate mb-4">Địa chỉ của bạn</p>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div data-bs-toggle="collapse">
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address1"
                                                                    id="info-address1" class="card-radio-input"
                                                                    checked>
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">Address 1</span>
                                                                    <span class="fs-14 mb-2 d-block">{{$auth->name}}</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap mb-1 d-block">Triều Khúc, Thanh Trì, Hà Nội</span>
                                                                    <span class="text-muted fw-normal d-block">Phone:
                                                                        012-345-6789</span>
                                                                </div>
                                                            </label>
                                                            <div class="edit-btn bg-light  rounded">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-placement="top" title
                                                                    data-bs-original-title="Edit">
                                                                    <i class="bx bx-pencil font-size-16"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address2"
                                                                    id="info-address2" class="card-radio-input">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">Address 2</span>
                                                                    <span class="fs-14 mb-2 d-block">Bradley
                                                                        McMillian</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap mb-1 d-block">109
                                                                        Clarksburg Park Road Show Low, AZ 85901</span>
                                                                    <span class="text-muted fw-normal d-block">Mo.
                                                                        012-345-6789</span>
                                                                </div>
                                                            </label>
                                                            <div class="edit-btn bg-light  rounded">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-placement="top" title
                                                                    data-bs-original-title="Edit">
                                                                    <i class="bx bx-pencil font-size-16"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Payment Info</h5>
                                            <p class="text-muted text-truncate mb-4">Phương thức thanh toán
                                            </p>
                                        </div>
                                        <div>
                                            <h5 class="font-size-14 mb-3">Payment method :</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div data-bs-toggle="collapse">
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method"
                                                                id="pay-methodoption1" class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                                Credit / Debit Card
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method"
                                                                id="pay-methodoption2" class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                                Paypal
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method"
                                                                id="pay-methodoption3" class="card-radio-input"
                                                                checked>
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-money d-block h2 mb-3"></i>
                                                                <span>Cash on Delivery</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <a href="/" class="btn btn-link text-muted">
                                <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                        </div>
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <button class="btn btn-success" type="submit"><i
                                        class="mdi mdi-cart-outline me-1"></i> Procced</button>
                                {{-- <a href="#" >
                                    <i class="mdi mdi-cart-outline me-1"></i> Procced </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-3">
                                <h5 class="font-size-16 mb-0">Order Summary <span
                                        class="float-end ms-2">#MN0124</span></h5>
                            </div>
                            <div class="table-responsive">
                                <input type="hidden" value="{{ $toltal_price = 0 }}">
                                <input type="hidden" value="{{ $item }}">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" style="width: 110px;" scope="col">Product
                                            </th>
                                            <th class="border-top-0" scope="col">Product Desc</th>
                                            <th class="border-top-0" scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_list_items as $item)
                                            <tr>
                                                <th scope="row"><img
                                                        src="{{ asset('assets/img/' . $item->product->image) }}"
                                                        alt="product-img" title="product-img"
                                                        class="avatar-lg rounded">
                                                </th>
                                                <td>
                                                    <h5 class="font-size-16 text-truncate"><a href="#"
                                                            class="text-dark"></a>{{ $item->product->name }}</h5>
                                                    <p class="text-muted mb-0">
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star-half text-warning"></i>
                                                    </p>
                                                    <p class="text-muted mb-0 mt-1">{{ $item->product->price }} đ x {{ $item->quantity }}</p>
                                                </td>
                                                <td>{{ $item->quantity * $item->price }} đ</td>
                                            </tr>
                                        @endforeach

                                        {{-- <tr>
                                            <th scope="row"><img
                                                    src="https://www.bootdey.com/image/280x280/FF00FF/000000"
                                                    alt="product-img" title="product-img" class="avatar-lg rounded">
                                            </th>
                                            <td>
                                                <h5 class="font-size-16 text-truncate"><a href="#"
                                                        class="text-dark">Smartphone Dual Camera</a></h5>
                                                <p class="text-muted mb-0">
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                </p>
                                                <p class="text-muted mb-0 mt-1">$ 260 x 1</p>
                                            </td>
                                            <td>$ 260</td>
                                        </tr> --}}
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Sub Total :</h5>
                                            </td>
                                            <td>
                                                {{ $totalPrice }} đ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Discount :</h5>
                                            </td>
                                            <td>
                                                - 0 đ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                            </td>
                                            <td>
                                                 0 đ
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                            </td>
                                            <td>
                                                $ 18.20
                                            </td>
                                        </tr> --}}
                                        <tr class="bg-light">
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Total:</h5>
                                            </td>
                                            <td>
                                                {{ $totalPrice }} đ
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</div>
