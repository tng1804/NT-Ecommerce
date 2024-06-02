@extends('admin.admin')
@section('click_account','active')
@section('table')
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
@endsection
@section('main')
    <h2>QUẢN LÝ TÀI KHOẢN - Lấy dữ liệu từ API</h2>
    <a href="{{route('account.create')}}" class="btn btn-success">Thêm</a>
    <hr>
    @if (isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Quyền</th>
                {{-- <th>Ngày tạo</th> --}}
                <th>Chức năng</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td scope="row">{{$account['id']}}</td>
                    <td>{{$account['name']}}</td>
                    <td>{{$account['email']}}</td>
                    <td>{{$account['phone']}}</td>
                    <td>{{$account['address']}}</td>
                    <td>
                        @if ($account['quyen'] == 0)
                            admin
                        @else
                            customer
                        @endif
                    </td>
                    {{-- <td>{{$account->created_at->format('d/m/Y')}}</td> --}}
                    <td>
                        <form action="{{route('account.destroy',$account['id'])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('account.edit',$account['id'])}}" class="btn btn-sm btn-primary" title="Sửa"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{$accounts->links()}} --}}
@endsection
