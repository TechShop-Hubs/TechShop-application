<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
<div class="container">
    <h1>Thanh toán</h1>
    <div class="frame m-0">
        <form action="/checkout_order" method="post">
            @csrf
            <div class="row ms-3 mt-4 me-3">
                <div class="col-6 pe-3">
                    <h3 class="">Thông tin khách hàng</h3>
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="name" class="form-label"><b>Họ và tên</b></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}">
                            @error('name')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="phone_number" class="form-label"><b>Số điện thoại</b></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ $user->phone_number }}">
                            @error('phone_number')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label"><b>Địa chỉ</b></label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Nhập địa chỉ của bạn...">
                            @error('address')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="payment_method" class="form-label"><b>Chọn phương thức thanh toán</b></label>
                            <select class="form-select" name="payment_method">
                                <option value="COD" selected>COD</option>
                                <option value="Momo">Momo</option>
                            </select>
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
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá gốc</th>
                                    <th scope="col">Khuyến mãi</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sell_price }}</td>
                                        <td class="w-2">{{ $product->discount }}%</td>
                                        <td>{{ $product->product_quantity}}</td>
                                        <td>{{ ($product->sell_price * (1 - $product->discount / 100)) * $product->product_quantity + $fee }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Phí vận chuyển</b></label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="fee" readonly value="{{ $fee }}">
                                <span class="input-group-text">VND</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Tổng tiền</b></label>
                            <div class="input-group">
                                <input type="number" class="form-control" readonly
                                    value="{{ $totalPrice }}"
                                    id="total_price" name="total_price">
                                <span class="input-group-text">VND</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-5">
                    <button type="submit" class="btn btn-success btn-lg">Đặt hàng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('layouts.footer')
