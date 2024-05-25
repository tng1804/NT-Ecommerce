@extends('admin.admin')
@section('click_category','active')
@section('table')
<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
@endsection
@section('main')
    <h2>QUẢN LÝ DANH MỤC</h2>
    <a href="{{route('category.create')}}" class="btn btn-success">Thêm</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
                <tr>
                    <td scope="row">{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->status == 0 ? 'Tạm ẩn':'Hiển thị'}}</td>
                    <td>
                        <form action="{{route('category.destroy', $cat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('category.edit', $cat->id)}}" class="btn btn-sm btn-primary" title="Sửa"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash" title="Xóa"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{$cats->links()}}
@endsection
