<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Register</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap');

    .container {
        font-family: Montserrat, Arial, Helvetica, sans-serif;
        background-color: #333333;
        box-sizing: border-box;
        padding: 20px;
        width: 500px;
        border: 1px solid #333333;
        border-radius: 10px;
        -webkit-box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
        -moz-box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
        box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
    }

    /* Full-width input fields */
    input[type=text],
    input[type=email],
    input[type=phone],
    input[type=password] {
        width: 100%;
        padding: 15px;
        border-radius: 10px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f7f7f7;
        font-family: Montserrat, Arial, Helvetica, sans-serif;
    }

    input[type=text]:focus,
    input[type=email]:focus,
    input[type=password]:focus,
    input[type=phone]:focus,
    select:focus {
        background-color: #ddd;
        outline: none;
    }
</style>

<body>
    <div class="container-fluid" style="background: linear-gradient(90deg, #FFE259 0%, #FFA751 100%);">
        <div class="row">
            <div class="col-4" style="margin-left: 3%; padding-top: 5%; height: 100vh; overflow: hidden;">
                <img src="{{ asset('assets/images/Logo.png') }}" style="">
                <p
                    style="padding-top: 5%; text-align: center; color: black; font-size: 36px; font-family: Roboto; font-weight: 700;">
                    Đăng ký ngay để nhận được nhiều khuyến mãi đặc biệt</p>
            </div>
            <div class="col-7 d-flex justify-content-center align-items-center" style="height: 100vh; overflow: hidden;">
                <form action="#" method="POST">
                    <div class="container">
                        <h1 style="color: white; text-align: center">Tạo tài khoản</h1>

                        <input type="text" name="userName" placeholder="Nhập họ và tên" required>
                        <input type="email" placeholder="Email" name="email" required>
                        <input type="phone" name="phone" placeholder="Số điện thoại" required>
                        <input type="text" name="nameLogin" placeholder="Tên đăng nhập" required>
                        <input type="password" placeholder="Mật khẩu" name="password" required>
                        <input type="password" placeholder="Xác nhận mật khẩu" name="vnpassword" required>

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4" style="height: 15%; background: linear-gradient(90deg, #FFE259 0%, #FFA751 100%); border-radius: 2rem; border: 1px black solid">
                                <a href="{{ route('home') }}" class="btn" style="width: 100%; color: #333333; text-align: center; font-size: 22px; font-family: Roboto; font-weight: 700; display: flex; justify-content: center; align-items: center;">
                                    Quay lại
                                </a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4" style="height: 15%; background: linear-gradient(90deg, #FFE259 0%, #FFA751 100%); border-radius: 2rem; border: 1px black solid">
                                <button type="submit" class="btn" style="width: 100%; color: #333333; text-align: center; font-size: 22px; font-family: Roboto; font-weight: 700; display: flex; justify-content: center; align-items: center;">
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
