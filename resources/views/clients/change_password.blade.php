<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
<div class="container text-center">
    <h2 class="text-center">Bạn muốn thay đổi mật khẩu ?</h2>
    <form method="post" class="mt-5">
        @csrf
        <div class="row">
            <div class="col-3"></div>
            <label for="password" class="col-2"><b>Mật khẩu của bạn</b></label>
            <input type="text" name="password" class="col-4" value="{{ $password }}">
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="row gap-5 d-flex justify-content-center align-items-center mt-5">
            <a href="/history_order" class="btn btn-warning col-2">Quay lại</a>
            <button type="submit" class="btn btn-primary col-2">Cập nhật</button>
        </div>
    </form>
</div>
