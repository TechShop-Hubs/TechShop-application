<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<link rel="stylesheet" href="{{ asset('assets/css/detail_product.css') }}">
<div class="container p-0 m-0">
    <div class="frame">
        <div class="row mt-5 larger">
            <div class="col-4 text-center">
                <h2>{{ $product->name }}</h2>
                <img src="{{ asset('assets/images/iphone_expl.jpg') }}" alt="">
            </div>
            <div class="col-4">
                <p class="sell_price">{{ $product->sell_price }}đ</p>
                <h3 style="color: red">{{ $product->sell_price * (1 - $product->discount / 100) }}đ</h3>
                <p>Tiết kiệm đến {{ $product->discount }}% cho khách hàng</p>
                <a class="btn btn-danger btn-lg w-100 mt-5" href="/checkout/{{ $product->id }}">Mua ngay</a>
                <div class="calltoaction mt-2">
                    <a class="btn btn-warning btn-lg me-3" href="/cart/{{ $product->id }}">Thêm vào giỏ hàng</a>
                    <a class="btn btn-lg btn-info" style="width: 11rem" href="/wishlish/{{ $product->id }}">Yêu thích</a>
                </div>
            </div>
            <div class="col-4 specification">
                <h3 class="text-center mb-4">Thông số kỹ thuật</h3>
                <div class="row">
                    <div class="col-4 agr">
                        <p>CPU:</p>
                        <p>Bộ nhớ:</p>
                        <p>Ram:</p>
                        <p>Màn hình:</p>
                        <p>Khối lượng:</p>
                    </div>
                    <div class="col-7">
                        <p>{{ $product->cpu }}</p>
                        <p>{{ $product->memory }}</p>
                        <p>{{ $product->ram }}</p>
                        <p>{{ $product->screen_type }}</p>
                        <p>{{ $product->weight }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 larger mb-3">
            <h2 class="text-center">Đặc điểm nổi bật</h2>
            <p>{{ $product->describe_product }}</p>
        </div>
    </div>
</div>
@include('layouts.footer')

