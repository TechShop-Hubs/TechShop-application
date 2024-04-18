<title>{{ $data['title'] }}</title>
@include('layouts.header')
<div class="p-2">

    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if (session('err'))
        <div class="alert alert-danger">{{ session('err') }}</div>
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
                        <th></th>
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
                            <td>{{ $cart->sell_price * (1 - $cart->discount / 100) }}</td>

                            <td>{{ $cart->product_quantity * ($cart->sell_price * (1 - $cart->discount / 100)) }}</td>
                            <td>
                                <input type="checkbox" name="cartItem" value="{{$cart->cart_id}}">
                            </td>
                            <td class="d-flex flex-row gap-2">
                                <form action="{{ route('deleteCart', ['id' => $cart->cart_id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                                    <button type="submit" class="btn btn-danger">Xóa</button>
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
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="redirect d-flex flex-row justify-content-between">
                <a href="/" class="btn btn-warning">Về trang chủ</a>
                <button type="submit" class="btn btn-success" id="checkout" >Tiến hành thanh toán</button>
            </div>
        </div>
    </div>
</div>

<script>
    let check = document.getElementById('checkout');
    check.addEventListener('click', ()=>{
        // Lấy danh sách các cart_id đã chọn
        let checkedItems = document.querySelectorAll('input[name="cartItem"]:checked');
        let checkedIds = [];
        // Lặp qua các ô đánh dấu đã chọn và lấy giá trị value của chúng
        checkedItems.forEach(item => {
            checkedIds.push(item.value); // Lấy giá trị của ô checkbox
        });
        // Chạy hàm xử lý thanh toán và truyền danh sách các cart_id đã chọn
        if (checkedIds.length==0){
            alert('Please select least one item');
        }else{
            proceedToCheckout(checkedIds);
        }
    });
    function proceedToCheckout(selectedIds) {
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = '/checkout'; // Đặt URL của phương thức POST
        let csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token'; // Tên của trường CSRF token trong Laravel
        csrfToken.value = '{{ csrf_token() }}'; // Lấy giá trị CSRF token từ Laravel và gán vào input
        form.appendChild(csrfToken);
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'cartIds'; // Đặt tên cho input, đây sẽ là tên khi bạn lấy dữ liệu trong phía server
        input.value = JSON.stringify(selectedIds); // Chuyển đổi mảng thành chuỗi JSON và đặt giá trị của input là chuỗi này
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
    
</script>
