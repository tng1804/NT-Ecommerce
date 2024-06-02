@extends('main')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/my-login.css">
    <div id="top" style="margin-top: 100px; margin-bottom: 50px"></div>
    @if (session('success'))
        <div style="top: -23px" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <body style="align-items: center " class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 style="text-align: center" class="card-title">Đổi mật khẩu</h4>

                                <form action="{{ route('home.changePassword', $user->id) }}" method="POST"
                                    class="my-login-validation" novalidate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="email">E-Mail Address</label>
                                        <input disabled style="opacity: 0.5" id="email" type="email"
                                            class="form-control" name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Your email is invalid
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="old_password">Mật khẩu hiện tại</label>
                                        <input id="old_password" type="password" class="form-control" name="old_password"
                                            required data-eye>
                                        @error('old_password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Mật khẩu mới</label>
                                        <input id="new_password" type="password" class="form-control" name="new_password"
                                            required data-eye>
                                        @error('new_password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Nhập lại mật khẩu mới</label>
                                        <input id="confirm_password" type="password" class="form-control"
                                            name="confirm_password" required data-eye>
                                        @error('confirm_password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Đổi mật khẩu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('assets')}}/js/my-login.js"></script> --}}
{{-- @endsection --}}
