@extends('user.index')
@section('route')
    Đăng nhập
@stop()
@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#account-info" class="active" ><i class="lastudioicon-home-2"></i> Đăng nhập</a></li>
            
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
                                <legend>Đăng nhập</legend>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="current-pwd">Email</label>
                                        <input class="form-field" type="text" id="current-pwd" name="email">
                                        @error('email')
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
                                    <div>
                                        @if (Session::has('warning'))
                                            <span style="color: red">{{ Session::get('warning') }}</span>
                                        @endif
                                        @if (Session::has('no_confirm_email'))
                                            <span style="color: red">{{ Session::get('no_confirm_email') }}</span>
                                        @endif
                                        <button class="btn btn-lg btn-primary w-100 fs-6 mt-1" type="submit">Đăng nhập</button>
                                        <p>Bạn chưa có tài khoản? <a href="{{ route('user.register') }}">Đăng ký</a> </p>
                                        <p>Bạn quên mật khẩu? <a href="{{ route('user.forgot') }}">Lấy lại mật khẩu</a> </p>
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