@extends('admin.admin')
@section('click_account','active')
@section('table')
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
@endsection
@section('main')
    <h2>QUẢN LÝ TÀI KHOẢN</h2>
    <a href="{{route('account.create')}}" class="btn btn-success">Thêm</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                {{-- <th>Ngày tạo</th> --}}
                <th>Chức năng</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td scope="row">{{$account->id}}</td>
                    <td>{{$account->name}}</td>
                    <td>{{$account->email}}</td>
                    <td>{{$account->phone}}</td>
                    <td>{{$account->address}}</td>
                    {{-- <td>{{$account->created_at->format('d/m/Y')}}</td> --}}
                    <td>
                        <form action="{{route('account.destroy',$account->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('account.edit',$account)}}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{$accounts->links()}}
@endsection
