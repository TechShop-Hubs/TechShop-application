@extends('layouts.admin')

@section('title', $data['title'])
@section('content')
    <h1 class="pt-4"><strong>{{ $data['title'] }}</strong></h1>
    <div class="row">
        <div class="col-6">
            <div class="bg-info border p-2">
                <h2 class="m-0"><strong>Trang chủ/ {{ $data['title'] }}</strong></h2>
            </div>
        </div>
    </div>
    <div class="btn btn-success mt-4 p-3"  ><a class="text-decoration-none text-white" href="{{route('users')}}">Về danh sách</a></div>
    <div class="container">
        <h2>Thông tin cơ bản</h2>
        <div class="">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" disabled >
        </div>
        <div class="">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
        </div>
        <div class="">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="" value="{{$user->phone_number}}" disabled>
        </div>
        <div class="">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="text" class="form-control" name="password" id="" value="{{$user->password}}" disabled>
        </div>
        <button class="btn btn-success "><a class="text-decoration-none text-white" href="/admin/user">Quay lại</a></button>
    </div>
@endsection