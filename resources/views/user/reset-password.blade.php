@extends('user.index')
@section('route')
    Tạo mật khẩu mới
@stop()
@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#account-info" class="active" ><i class="lastudioicon-home-2"></i>Tạo mật khẩu mới</a></li>
            
        </ul>
    </div>
@stop()
@section('content')
    <div  id="account-info">
        <div class="myaccount-content account-details">
            <div class="account-details-form">
                <form action="" class="mt-4" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <fieldset>
                                <legend>Tạo mật khẩu mới</legend>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="current-pwd">Mật khẩu mới</label>
                                        <input class="form-field" type="password" id="current-pwd" name="new_password">
                                        @error('new_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="new-pwd">Nhập lại mật khẩu</label>
                                        <input class="form-field" type="password" id="new-pwd" name="confirm_new_password">
                                        @error('new_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        @if (Session::has('warning'))
                                            <span style="color: red">{{ Session::get('warning') }}</span>
                                        @endif
                                        @if (Session::has('no_confirm_email'))
                                            <span style="color: red">{{ Session::get('no_confirm_email') }}</span>
                                        @endif
                                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Lấy mật khẩu</button>
                                        <p>Bạn chưa có tài khoản? <a href="{{ route('user.login') }}">Đăng nhập</a> </p>
                                        <a href="{{ route('home') }}">Quay về trang chủ</a>
                                   </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop()