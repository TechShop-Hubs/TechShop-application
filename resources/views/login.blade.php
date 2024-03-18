<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7" style="height: 100vh; overflow: hidden;">
                <div style="width: 90%; height: 130vh; background: linear-gradient(90deg, #FFE259 0%, #FFA751 100%); border-radius: 50%; transform: translateY(-10%);">
                    <div style="width: 85%; height: 130vh; background: linear-gradient(90deg, #FFE259 0%, #ffb553 100%); border-radius: 20%; transform: translateX(-10%);">
                        <div style="padding-top: 20%; padding-left: 15%; height: 60%;">
                            <img src="{{ asset('assets/images/Logo.png') }}" alt="" height="95%">
                        </div>
                        <div style="padding-left: 20%; width: 90%; color: #4F4F4F; font-size: 32px; font-family: Roboto; font-weight: 700; word-wrap: break-word">Hi there, do you have money? Tell me how much, i will give you things you need</div>
                        <div style="padding-top: 9%; padding-left: 20%; width: 90%; ">
                            <img src="{{ asset('assets/images/reply.svg') }}" alt="" style="transform: translateY(-25%);">
                            <span style="color: #4F4F4F; font-size: 26px; font-family: Roboto; font-weight: 700; word-wrap: break-word"> Trang chủ </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5" style="height: 100vh; overflow: hidden;">
                <div class="FormLogin" style="width: 100vh; height: 100vh; position: relative">
                    <form style="margin-top: 12.5%; width: 70%; height: 75%; left: 0px; top: 0px; position: absolute; background: linear-gradient(90deg, #FFE259 0%, #FFA751 100%); border-radius: 20px">
                        <input type="text" name="userName" placeholder="Email - Tài khoản" style="padding-left: 10px; color: #828282; font-size: 30px; font-family: Roboto; font-weight: 700; position: absolute; top: 15%; transform: translateX(18%);">
                        <input type="text" name="password" placeholder="Mật khẩu" style="padding-left: 10px; color: #828282; font-size: 30px; font-family: Roboto; font-weight: 700; position: absolute; top: 30%; transform: translateX(18%);">
                        <button type="submit" style="position: absolute; top: 50%; transform: translateX(75%); width: 40%; color: #333333; font-size: 30px; font-family: Roboto; font-weight: 700; border-radius: 1.5rem">Đăng nhập</button>
                    </form>
                    <a href="{{ route('home') }}" style="position: absolute; top: 70%; transform: translateX(50%); color: black; font-size: 30px; font-family: Roboto; font-style: italic; font-weight: 400; text-decoration: underline; ">Bạn quên mật khẩu ?</a>
                    <div style="position: absolute; top: 75%; transform: translateX(20%);">
                        <span style="color: black; font-size: 30px; font-family: Roboto; font-style: italic; font-weight: 400; word-wrap: break-word">Bạn chưa có tài khoản?</span>
                        <span style="color: #333333; font-size: 30px; font-family: Roboto; font-style: italic; font-weight: 200; word-wrap: break-word"></span>
                        <a href="{{ route('register') }}" style="color: #333333; font-size: 30px; font-family: Roboto; font-style: italic; font-weight: 700; text-decoration: underline; word-wrap: break-word">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</html>
