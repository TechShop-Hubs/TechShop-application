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
                <div class="col-12">
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
                        <select class="form-control" name="status" id="status">
                            @foreach($statusArr as $status)
                                <option value="{{ $status }}" {{ $status == $order->status ? 'selected' : ''}}>{{ $status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Sửa</button>
            </div>
        </form>
    </div>
@endsection
