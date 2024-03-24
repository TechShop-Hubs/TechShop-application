<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <title>Register</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 register_logo">
                <img src="{{ asset('assets/images/Logo.png') }}">
                <p>
                    Đăng ký ngay để nhận được nhiều khuyến mãi đặc biệt</p>
            </div>
            <div class="col-7 d-flex justify-content-center align-items-center register_background">
                <form method="POST" class="register_form">
                    @csrf
                    <div class="container">
                        <h1>Tạo tài khoản</h1>

                        <input type="text" name="userName" placeholder="Nhập họ và tên" required minlength="3" value="{{old('userName')}}">
                        <input type="email" placeholder="Email" name="email" required value="{{old('email')}}">
                        @error('email')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                        <input type="phone" name="phone" placeholder="Số điện thoại" required minlength="10" value="{{old('phone')}}">
                        <input type="password" placeholder="Mật khẩu" name="password" required minlength="8">
                        <input type="password" placeholder="Xác nhận mật khẩu" name="vnpassword" required minlength="8">
                        @error('vnpassword')
                            <p style="color: red">{{$message}}</p>
                        @enderror

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4 register_back">
                                <a href="{{ route('home') }}" class="btn">
                                    Quay lại
                                </a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 register_button">
                                <button type="submit" class="btn">
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</html>
