@extends('admin.admin')
@section('click_product', 'active')
@section('main')
    <h1>Thêm sản phẩm</h1>
    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder=""
                        value="{{ $product->name }}">
                </div>
                <label for="" class="">Ảnh</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">{{ $product->image }}</label>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="" class="">Ảnh</label>
                    <input type="file" class="form-control" name="image" id="imageInput">
                    <span id="selectedFileName"></span>
                </div> --}}
                <div class="form-group">
                    <label for="" class="">Số lượng</label>
                    <input type="text" class="form-control" name="quantity" id="inputName" placeholder=""
                        value="{{ $product->quantity }}">
                </div>
                <div class="form-group">
                    <label for="" class="">Giá</label>
                    <input type="text" class="form-control" name="price" id="inputName" placeholder=""
                        value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="" class="">Mô tả</label>
                    <input type="text" class="form-control" name="content" id="inputName" placeholder=""
                        value="{{ $product->content }}">
                </div>
                <div class="form-group">
                    <label for="" class="">Id danh mục</label>
                    <select name="category_id" class="custom-select" id="inputGroupSelect01">
                        <option selected>Chọn...</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" @if ($cat->id == $product->category_id) selected @endif>
                                {{ $cat->name }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Sửa</button>
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
