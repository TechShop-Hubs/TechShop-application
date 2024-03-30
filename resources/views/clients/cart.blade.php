<title>{{ $data['title'] }}</title>
@include('layouts.header')
<div class="p-2">

    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</div>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center" >Chi tiết giỏ hàng</h2>
    </div>

    <div class="container">
        <table class="table table-bordered"> <!-- Thêm lớp table-bordered để thêm viền cho bảng -->
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $index => $cart)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $cart->product_name }}</td>
                    <td>Hình ảnh lấy từ bảng image nha</td>
                    <td class="d-flex flex-row gap-3">
                        <form action="{{route('reduceQuantity')}}" method="post" >
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$cart->cart_id}}">
                            <input type="hidden" name="product_quantity" value="{{$cart->product_quantity}}">
                            <button type="submit" class="btn btn-sm btn-secondary">-</button>
                        </form>
                        {{ $cart->product_quantity }}
                        <form action="{{route('increaseQuantity')}}" method="post">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$cart->cart_id}}">
                            <input type="hidden" name="product_quantity" value="{{$cart->product_quantity}}">
                            <button type="submit" class="btn btn-sm btn-primary">+</button>
                        </form>
                    </td>
                    <td>{{ $cart->sell_price * ($cart->discount / 100) }}</td>
                    <td>{{ $cart->product_quantity * $cart->sell_price * ($cart->discount / 100) }}</td>
                    @php
                        $total_price += $cart->product_quantity * $cart->sell_price * ($cart->discount / 100);
                    @endphp
                </tr>
             
                @endforeach
                <tr>
                    <td colspan="5"></td>
                    <td><strong>{{ $total_price }}</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="redirect d-flex flex-row justify-content-between">
            <a href="/" class="btn btn-warning">Về trang chủ</a>
            <a href="/order" class="btn btn-success">Tiến hành thanh toán</a>

        </div>
    </div>

</div>
{{-- @include('layouts.footer') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Dưới phần script -->
<script>


function updateQuantity(cartId, newQuantity) {
    $.ajax({
        type: 'POST',
        url: '/update-quantity',
        data: {
            _token: '{{ csrf_token() }}',
            cart_id: cartId,
            quantity: newQuantity
        },
        success: function(response) {
            // Xử lý kết quả thành công (nếu cần)
            console.log(response.message);
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi (nếu cần)
            console.error('An error occurred while updating quantity');
        }
    });
}
</script>




