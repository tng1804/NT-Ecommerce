@extends('admin.admin')
@section('click_order', 'active')
@section('table')
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
@endsection
@section('main')
    <h2>QUẢN LÝ ĐƠN HÀNG</h2>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th style="vertical-align: top">Email</th>
                <th>Số điện thoại</th>
                <th style="vertical-align: top"> Địa chỉ</th>
                <th style="vertical-align: top">Trạng thái</th>
                <th>Ngày đặt hàng</th>
                <th style="vertical-align: top">Chức năng</th>
                <th style="vertical-align: top">Hóa đơn</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td scope="row">{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>
                        @switch($order->status)
                            @case(0)
                                <span class="badge badge-info badge-pill">Chờ xử lý </span>
                            @break

                            @case(1)
                                <span class="badge badge-success badge-pill">Đã xác nhận</span>
                            @break

                            @case(2)
                                <span class="badge badge-success badge-pill">Đang xử lý</span>
                            @break

                            @case(3)
                                <span class="badge badge-success badge-pill">Đã xuất kho</span>
                            @break

                            @case(4)
                                <span class="badge badge-success badge-pill">Đang giao hàng</span>
                            @break

                            @case(5)
                                <span class="badge badge-success badge-pill">Giao hàng thành công</span>
                            @break

                            @case(6)
                                <span class="badge badge-danger badge-pill">Đã hủy</span>

                                @default
                            @endswitch
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('order.delete', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a style="margin-bottom: 5px" href="{{ route('order.edit', $order->id) }}"
                                    class="btn btn-sm btn-primary" title="Sửa"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>

                            <a style="margin-bottom: 5px" href="{{ route('order.bill', $order->id) }}"
                                class="btn btn-sm btn-info" title="Thông tin hóa đơn"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('order.exprotPdf', $order->id) }}" class="btn btn-sm btn-secondary" title="Xuất ra PDF"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{$orders->links()}}
    @endsection
