<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')

<div class="p-2">
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</div>

<div class="container mt-4">
    <form action="" method="post">
        @csrf
        <h2>Thông tin cơ bản</h2>
        <div class="">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <label for="phone_number" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone_number" id="" value="{{ $user->phone_number }}">
            @error('phone_number')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="row gap-5 d-flex justify-content-center align-items-center mt-5">
            <a href="/history_order" class="btn btn-warning col-2">Quay lại</a>
            <button type="submit" class="btn btn-primary col-2">Cập nhật</button>
        </div>
    </form>
</div>
