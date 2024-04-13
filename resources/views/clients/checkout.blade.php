<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
<div class="container">
    <h1>Thanh toán</h1>
    <div class="frame m-0">
        <form method="post">
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
                                <option value="momo">Trực tuyến</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h3 class="">Thông tin sản phẩm</h3>
                    <div class="row g-3">
                        {{-- <div class="col-6">
                            <label for="" class="form-label"><b>Tên sản phẩm</b></label>
                            <input type="text" class="form-control" value="{{ $product->name }}" readonly>
                            <input type="hidden" value="{{ $product->id }}">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Hãng</b></label>
                            <input type="text" class="form-control" readonly value="{{ $category->brand }}">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Giá sản phẩm</b></label>
                            <div class="input-group">
                                <input type="number" class="form-control" readonly value="{{ $product->sell_price }}">
                                <span class="input-group-text">VND</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Số lượng</b></label>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Giảm giá</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly value="">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                         --}}
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá gốc</th>
                                    <th scope="col">Khuyến mãi</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($listProduct as $product) --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sell_price }}</td>
                                        <td class="w-2">{{ $product->discount }}%</td>
                                        <td>
                                            <div class="number d-flex gap-1">
                                                <span class="minus sp pt-1">-</span>
                                                <input type="number" class="form-control" value="{{ isset($quantity) ? $quantity : '1' }}" id="count" name="quantity" readonly />
                                                <span class="plus sp pt-1">+</span>
                                            </div>
                                        </td>
                                        <td>{{ $product->sell_price * (1 - $product->discount / 100) + $fee }}</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Phí vận chuyển</b></label>
                            <div class="input-group">
                                <input type="number" class="form-control" readonly value="{{ $fee }}">
                                <span class="input-group-text">VND</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label"><b>Tổng tiền</b></label>
                            <div class="input-group">
                                <input type="number" class="form-control" readonly
                                    {{-- value="{{ $product->sell_price * (1 - $product->discount / 100) + $fee }}" --}}
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let minusButtons = document.querySelectorAll('.minus');
        let plusButtons = document.querySelectorAll('.plus');
        let count = 1;

        minusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                let input = this.parentElement.querySelector('input');
                let total = document.getElementById('total_price');
                let unfee = {{ $product->sell_price * (1 - $product->discount / 100) }};
                let fee = {{ $fee }};
                count = parseInt(input.value) - 1;
                count = count < 1 ? 1 : count;
                input.value = count;
                input.dispatchEvent(new Event('change'));
                let finalPrice = (unfee * count) + fee;
                total.value = finalPrice;
                return false;
            });
        });

        plusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                count = this.parentElement.querySelector('input');
                let total = document.getElementById('total_price');
                let unfee = {{ $product->sell_price * (1 - $product->discount / 100) }};
                let fee = {{ $fee }};
                count.value = parseInt(count.value) + 1;
                count.dispatchEvent(new Event('change'));
                let finalPrice = (unfee * parseInt(count.value)) + fee;
                total.value = finalPrice;
                return false;
            });
        });
    });
</script>
