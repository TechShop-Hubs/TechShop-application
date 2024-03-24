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

    @if (session('msg'))
        <div class="alert alert-danger">{{ session('msg') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu không hợp lệ vui lòng nhập lại</div>
    @endif

    <div class="btn btn-success mt-4 p-3"><a class="text-decoration-none text-white" href="{{ route('categories') }}">Về danh sách</a></div>

    <form action="{{ route('postCreateCategory') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-4 border mt-5 d-flex flex-column gap-5">
                <h2>Thêm danh mục</h2>
                <div class="form-group">
                    <label for="kind">Tên danh mục</label>
                    <input type="text" class="form-control" name="kind" id="" placeholder="Tên danh mục">
                    @error('kind')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand">Hãng</label>
                    <input type="text" class="form-control" name="brand" id="" placeholder="Hãng">
                    @error('brand')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Tạo mới</button>
            </div>
        </div>
    </form>
@endsection
