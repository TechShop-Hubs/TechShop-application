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
    {{-- nav --}}
    <div class="navbar container-fluid d-flex justify-content-between align-items-center pe-5">
        <button class="btn btn-success btn-lg" type="submit" name="create">Tạo mới</button>
    </div>
    <!-- Hiển thị danh sách sản phẩm -->
    <div class="container-fluid pt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th class="col">Khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Giá trị đơn hàng</th>
                    <th class="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone_number}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Xem</a>
                            <a href="#" class="btn btn-warning">Cập nhật</a>
                            {{-- <a href="#" class="btn btn-danger">Xóa</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị liên kết phân trang -->
        <div class="d-flex justify-content-center align-items-center">
            {{$orders->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>
@endsection
