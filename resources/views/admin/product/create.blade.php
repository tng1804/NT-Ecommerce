@extends('admin.admin')
@section('click_product', 'active')
@section('main')
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="col-md-6 mx-auto">
                <h1 style="text-align: center">Thêm sản phẩm</h1>
                <div class="form-group">
                    <label for="" class="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <label for="" class="">Ảnh</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="">Số lượng</label>
                    <input type="text" class="form-control" name="quantity" id="inputName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="">Giá</label>
                    <input type="text" class="form-control" name="price" id="inputName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="">Mô tả</label>
                    <input type="text" class="form-control" name="content" id="inputName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="">Id danh mục</label>
                    <select name="category_id" class="custom-select" id="inputGroupSelect01">
                        <option selected>Chọn...</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-7 col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="" class="btn btn-primary"><a class= "btn-primary"
                            href="{{ route('product.index') }}">Quay lại</a></button>
                </div>
            </div>
    </div>
    </form>
    <script>
        document.getElementById("inputGroupFile01").addEventListener("change", function() {
            var fileName = this.files[0].name;
            var label = document.getElementById("fileLabel");
            label.textContent = fileName;
        });
    </script>
    </div>
@endsection
