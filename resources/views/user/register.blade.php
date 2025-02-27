@extends('user.index')
@section('route')
    Đăng ký
@stop()
@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#account-info" class="active" ><i class="lastudioicon-home-2"></i> Đăng ký</a></li>
            
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
                                <legend>Đăng ký</legend>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="current-pwd">Họ tên</label>
                                        <input class="form-field" type="text" id="current-pwd" name="name">
                                        @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="current-pwd">Số điện thoại</label>
                                        <input class="form-field" type="text" id="current-pwd" name="phone">
                                        @error('phone')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="current-pwd">Email</label>
                                        <input class="form-field" type="email" id="current-pwd" name="email">
                                        @error('email')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="current-pwd">Địa chỉ</label>
                                        <input class="form-field" type="text" id="current-pwd" name="address">
                                        @error('address')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="new-pwd">Mật khẩu</label>
                                        <input class="form-field" type="password" id="new-pwd" name="password">
                                        @error('password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="current-pwd">Nhập lại mật khẩu</label>
                                        <input class="form-field" type="password" id="current-pwd" name="confirm_password">
                                        @error('confirm_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Đăng ký</button>
                                        @if (Session::has('warning'))
                                          <span style="color: red">{{ Session::get('warning') }}</span>
                                        @endif
                                        <p>Bằng việc đăng ký tài khoản bạn đã đồng ý với <a href="#">Điều khoản sử dụng</a> của chúng tôi!</p>
                                        <p>Bạn đã có tài khoản? <a href="{{ route('user.login') }}">Đăng nhập</a> </p>
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