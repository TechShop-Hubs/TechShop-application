@extends('layouts.admin')

@section('title', $data['title'])

@section('content')
<h1 class="pt-4"><strong>{{ $data['title'] }}</strong></h1>
<div class="row p-2">
    <div class="col-6">
        <div class="bg-info border p-2">
            <h2 class="m-0"><strong>Trang chủ/ {{ $data['title'] }}</strong></h2>
        </div>
    </div>
</div>
@if (session('msg'))
<div class="alert alert-success">{{ session('msg') }}</div>
@endif
@if (session('err'))
<div class="alert alert-danger">{{ session('err') }}</div>
@endif
{{-- nav --}}
<div class="navbar container-fluid d-flex justify-content-between align-items-center pe-5">
    <button class="btn btn-success btn-lg"><a href="product/create" class="text-decoration-none text-white">Tạo mới</a></button>
    <form class="d-flex align-items-center">
        <input class="form-control form-control-lg me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
    </form>
    {{-- <button class="btn btn-secondary btn-lg" type="submit" name="reset">Đặt lại</button> --}}
</div>
<!-- Hiển thị danh sách sản phẩm -->
<div class="container-fluid pt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th class="col">Hình ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th class="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td><img src="{{ $product->image }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sell_price }}</td>
                <td>{{ $product->quantity_product }}</td>
                <td>
                    <a href="{{route('detailProduct',['id'=>$product->id])}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('updateProduct',['id'=>$product->id])}}" class="btn btn-warning">Cập nhật</a>
                    <a href="{{route('deleteProduct',['id'=>$product->id])}}" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Hiển thị liên kết phân trang -->
    <div class="d-flex justify-content-center align-items-center">
        {{$products->onEachSide(1)->links('admin.blocks.paginator') }}
    </div>
</div>
@endsection