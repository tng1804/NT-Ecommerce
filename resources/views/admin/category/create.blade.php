@extends('admin.admin')
@section('click_category', 'active')
@section('main')
    <h1>Thêm danh mục</h1>
    <div class="container">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="" class="">Trạng thái</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="1"
                                checked>
                            Hiển thị
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="0">
                            Tạm ẩn
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="" class="btn btn-primary"><a class= "btn-primary"
                            href="{{ route('category.index') }}">Quay lại</a></button>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection
