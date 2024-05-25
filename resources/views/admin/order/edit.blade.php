@extends('admin.admin')
@section('click_order', 'active')
@section('main')
    <div class="container">
        <form action="{{route('order.update',$order->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6 mx-auto">
                <h1>Cập nhật đơn hàng</h1>

                <div class="form-group">
                    <label for="" class="">Tên khách hàng</label>
                    <input disabled style="opacity: 0.5;" type="text" class="form-control" value="{{ $order->name }}" name="name" id="inputName"
                        placeholder="">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="">Email</label>
                    <input disabled style="opacity: 0.5;" type="text" class="form-control" value="{{ $order->email }}" name="email" id="inputName"
                        placeholder="">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="">Số điện thoại</label>
                    <input disabled style="opacity: 0.5;" type="text" class="form-control" value="{{ $order->phone }}" name="phone" id="inputName"
                        placeholder="">
                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="">Địa chỉ</label>
                    <input disabled style="opacity: 0.5;" type="text" class="form-control" value="{{ $order->address }}" name="address" id="inputName"
                        placeholder="">
                    @error('address')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="">Trạng thái</label>
                    <select name="status" class="custom-select" id="inputGroupSelect01">
                        <option {{ $order->status == 0 ? 'selected' : '' }} value="0">Chờ xử lý</option> 
                        <option {{ $order->status == 1 ? 'selected' : '' }} value="1">Đã xác nhận</option> 
                        <option {{ $order->status == 2 ? 'selected' : '' }} value="2">Đang xử lý</option> 
                        <option {{ $order->status == 3 ? 'selected' : '' }} value="3">Đã xuất kho</option> 
                        <option {{ $order->status == 4 ? 'selected' : '' }} value="4">Đang giao hàng</option> 
                        <option {{ $order->status == 5 ? 'selected' : '' }} value="5">Giao hàng thành công</option> 
                        <option {{ $order->status == 6 ? 'selected' : '' }} value="6">Đã hủy</option>                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="">Ngày đặt hàng</label>
                    <input disabled style="opacity: 0.5;" type="text" class="form-control" value="{{ $order->created_at }}" name="created_at" id="inputName"
                        placeholder="">
                    @error('created_at')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-7 col-sm-10">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button type="" class="btn btn-primary"><a class= "btn-primary"
                            href="{{ route('order.index') }}">Quay lại</a></button>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection
