<title>{{ $data['title'] }}</title>
@include('layouts.header')
<div class="p-2">

    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</div>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center">Chi tiết giỏ hàng</h2>
    </div>

    <div class="container">
        <div class="form">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng giá</th>
                        <th scope="col">Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $index => $cart)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $cart->product_name }}</td>
                            <td>Hình ảnh lấy từ bảng image nha</td>
                            <td class="d-flex flex-row gap-3">
                                <form action="{{ route('reduceQuantity') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                                    <input type="hidden" name="product_quantity" value="{{ $cart->product_quantity }}">
                                    <button type="submit" class="btn btn-sm btn-secondary"
                                        style="width:30px;height:30px;">-</button>
                                </form>
                                {{ $cart->product_quantity }}
                                <form action="{{ route('increaseQuantity') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                                    <input type="hidden" name="product_quantity"
                                        value="{{ $cart->product_quantity }}">
                                    <button type="submit" class="btn btn-sm btn-primary"
                                        style="width:30px;height:30px;">+</button>
                                </form>
                            </td>
                            <td>{{ $cart->sell_price * (1-($cart->discount / 100)) }}</td>
                    
                            <td>{{ $cart->product_quantity *($cart->sell_price * (1-($cart->discount / 100))) }}</td>
                            <td>
                                <form action="{{ route('checkout', ['id' => $cart->cart_id]) }}" method="get">
                                    {{-- @csrf --}}
                                    <input type="hidden" name="quantity" value="{{ $cart->product_quantity }}">
                                    <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                                </form>
                                
                            </td>
                            @php
                                $total_price += $cart->product_quantity * $cart->sell_price * ($cart->discount / 100);
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5"></td>
                        <td><strong>{{ $total_price }}</strong></td>
                        <td>
                            {{-- Các nút hoặc liên kết khác nếu cần --}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="redirect d-flex flex-row justify-content-between">
                <a href="/" class="btn btn-warning">Về trang chủ</a>
                {{-- <button type="submit" class="btn btn-success">Tiến hành thanh toán</button> --}}
            </div>
        </div>
    </div>
    <div class="test">
        <h2>test momo</h2>
        <form action="{{ route('momoPayment') }}" method="POST" class="border border-1">
            @csrf
            <input type="hidden" name="paymentMethod" value="momo">
            <input type="hidden" name="total_price" value="200000">
            <button type="submit" class="btn btn-primary ">pay</button>
        </form>
    </div>

</div>
{{-- @include('layouts.footer') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Dưới phần script -->
