@extends('admin.admin')
@section('click_account', 'active')
@section('main')
    <div class="container" >
        <form action="{{ route('account.store') }}" method="POST">
            @csrf
            <div class="col-md-6 mx-auto" >
                <h1 style="text-align: center">Thêm tài khoản</h1>
                <div class="form-group">
                    <label for="" class="">Họ tên</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="">Email</label>
                    <input type="email" class="form-control" name="email" id="inputName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="">Phone</label>
                    <input type="text" class="form-control" name="phone" id="inputName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="">Address</label>
                    <input type="text" class="form-control" name="address" id="inputName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="">Password</label>
                    <input type="password" class="form-control" name="password" id="inputName" placeholder="">
                </div>
                
            </div>

            <div class="form-group row">
                {{-- offset-sm-2 col-sm-10 --}}
                <div class="offset-sm-7 col-sm-8">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="" class="btn btn-primary"><a class= "btn-primary"
                            href="{{ route('account.index') }}">Quay lại</a></button>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection
