<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 login_banner">
                <div class="shape_1">
                    <div class="shape_2">
                        <div class="login_logo">
                            <img src="{{ asset('assets/images/Logo.png') }}" alt="" height="95%">
                        </div>
                        <div class="login_title">Hi there, do you have money? Tell me how much, i will give you things
                            you need</div>
                        <div class="login_back">
                            <img src="{{ asset('assets/images/reply.svg') }}" alt="">
                            <a href="{{ route('home') }}"> Trang chủ </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 login_background">
                <div class="login_background_1">
                    <form class="login_form">
                        <input class="login_name" type="text" name="userName" placeholder="Email - Tài khoản">
                        <input class="login_pass" type="text" name="password" placeholder="Mật khẩu">
                        <button class="login_button" type="submit">Đăng nhập</button>
                    </form>
                    <a class="login_question" href="{{ route('home') }}">Bạn quên mật khẩu ?</a>
                    <div class="login_another_choose">
                        <span>Bạn chưa có tài khoản?</span>
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</html>
