@extends('admin.admin')
@section('click_product','active')
@section('table')
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
@endsection
@section('main')
    <h2>QUẢN LÝ SẢN PHẨM</h2>
    <a href="{{route('product.create')}}" class="btn btn-success">Thêm</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Id danh mục</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Mô tả</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($products as $prod)
                <tr>
                    <td scope="row">{{$prod->id}}</td>
                    <td>{{$prod->name}}</td>
                    <td>{{$prod->category_id}}</td>
                    <td>
                        <img class="img" src="{{ asset('assets/img/' . $prod->image) }}" alt="logo" style="width: 100px;">
                    </td>
                    <td>{{$prod->quantity}}</td>
                    <td>{{$prod->price}} đ</td>
                    <td>
                        <form action="{{route('product.destroy', $prod->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('product.edit', $prod->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{$products->links()}}
@endsection
