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
    <div class="btn btn-success mt-4 p-3"  ><a class="text-decoration-none text-white" href="{{route('orders')}}">Về danh sách</a></div>
    <div class="container">
        <form action="" method="post">
            @csrf
            <input type="hidden" name="update">
            <div class="row">
                <div class="col-4">
                    <h2>Thông tin cơ bản</h2>
                    <div class="">
                        <label for="name" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $order->name }}"  readonly>
                    </div>
                    <div class="">
                        <label for="phone_number" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $order->phone_number }}" readonly >
                    </div>
                    <div class="">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $order->address }}"  readonly>
                    </div>
                    <div class="">
                        <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                        <input type="text" class="form-control" name="payment_method" id="payment_method" value="{{ $order->payment_method }}"  readonly>
                    </div>
                    <div class="">
                        <label for="total_price" class="form-label">Tổng tiền</label>
                        <input type="number" class="form-control" name="total_price" id="total_price" value="{{$order->total_price}}" readonly>
                    </div>
                    <div class="">
                        <label for="order_date" class="form-label">Ngày đặt</label>
                        <input type="text" class="form-control" name="order_date" id="order_date" value="{{$order->order_date}}" readonly>
                    </div>
                    <div class="">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" value="{{$order->status}}" readonly>
                    </div>
                </div>
                <div class="col-8">
                    <h2>Thông tin các sản phẩm</h2>
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($orderItems as $item)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
