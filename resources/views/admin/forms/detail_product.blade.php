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
    <div class="btn btn-success mt-4 p-3"  ><a class="text-decoration-none text-white" href="{{route('product')}}">Về danh sách</a></div>
    <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <h2>Thông tin cơ bản</h2>
                    <div class="">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" disabled >
                    </div>
                    <div class="">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}" disabled>
                    </div>
                    <div class="">
                        <label for="category" class="form-label">Danh mục</label>
                        <input type="text" class="form-control" name="category" id="" value="{{$category->kind}}_{{$category->brand}}" disabled>
                    </div>
                    <div class="">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" min="0" value="{{$product->quantity_product}}" disabled>
                    </div>
                    <div class="">
                        <label for="discount" class="form-label">Giảm giá</label>
                        <input type="number" class="form-control" name="discount" id="discount" min="0" value="{{$product->discount}}" disabled>
                    </div>
                    <div class="">
                        <label for="sellprice" class="form-label">Giá bán ra</label>
                        <input type="number" class="form-control" name="sellprice" id="sellprice" min="0" value="{{$product->sell_price}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <h2>Thông tin chi tiết</h2>
                    <div class="">
                        <label for="describe" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="describe" id="describe" rows="3" disabled>{{$product->describe_product}}</textarea>
                    </div>
                    <div class="">
                        <label for="screen-type" class="form-label">Kích thước màn hình</label>
                        <input type="text" class="form-control" name="screen-type" id="screen-type" value="{{$product->screen_type}}" disabled>
                    </div>
                    <div class="">
                        <label for="ram" class="form-label">Ram</label>
                        <input type="text" class="form-control" name="ram" id="ram" value="{{$product->ram}}" disabled>
                    </div>
                    <div class="">
                        <label for="memory" class="form-label">Bộ nhớ</label>
                        <input type="text" class="form-control" name="memory" id="memory" value="{{$product->memory}}" disabled>
                    </div>
                    <div class="">
                        <label for="cpu" class="form-label">Cpu</label>
                        <input type="text" class="form-control" name="cpu" id="cpu" value="{{$product->cpu}}" disabled>
                    </div>
                    <div class="">
                        <label for="weight" class="form-label">Trọng lượng</label>
                        <input type="text" class="form-control" name="weight" id="weight" value="{{$product->weight}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <h2>Hình ảnh cho sản phẩm</h2>
                    <div class="">
                        <label for="image" class="form-label">Hình ảnh</label>
                    </div>
                    <img style="height: 400px !important" class="form-control" src="{{ $product->image }}" alt="Hình anh">
                    <div id="image-container-wrapper"></div>
                </div>
            </div>
            <button class="btn btn-success "><a class="text-decoration-none text-white" href="/admin/product">Quay lại</a></button>
    </div>
@endsection
