<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<link rel="stylesheet" href="{{ asset('assets/css/history_order.css') }}">

<div class="p-2">
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</div>

<div class="container-fluid ps-5 pe-5">
    <h1>Thông tin người dùng và lịch sử đơn hàng</h1>
    <div class="frame m-0 mt-3">
        <div class="row ms-3 mt-4 me-3">
            <div class="col-6 pe-3">
                <h3 class="">Thông tin người dùng</h3>
                <div class="row g-3">
                    <div class="col-6">
                        <label for="name" class="form-label"><b>Họ và tên</b></label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}" readonly>
                    </div>
                    <div class="col-6">
                        <label for="phone_number" class="form-label"><b>Số điện thoại</b></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $user->phone_number }}" readonly>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label"><b>Địa chỉ</b></label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $user->email }}" readonly>
                    </div>
                    <div class="row gap-5 mt-4 d-flex justify-content-center align-items-center">
                        <a href="/change_password" class="btn btn-warning mb-3 col-4">Đổi mật khẩu</a>
                        <a href="/update_information" class="btn btn-info mb-3 col-4">Cập nhật thông tin</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h3 class="">Thông tin sản phẩm</h3>
                <div class="row g-3">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Giá trị đơn hàng</th>
                                <th scope="col">Thao tác</th>
                                <th scope="col">Huỷ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($listOrders as $order)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    @php
                                        $disableLink = $order->status !== 'Đơn hàng mới';
                                    @endphp
                                    <td><a href="/action_history/{{ $order->id }}">Xem chi tiết</a></td>
                                    <td>
                                        <a href="/cancel_order/{{ $order->id }}" class="btn btn-danger"
                                            @if ($disableLink) disabled style="pointer-events: none; cursor: default;" @endif>Huỷ
                                            đơn</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

