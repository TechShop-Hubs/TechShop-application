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
        <h2 class="text-center">Danh sách các sản phẩm đã thích</h2>
    </div>
    <div class="container">
        <div class="form">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm đã thích</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlists as $index => $wishlist)
                    <tr>
                        <th>{{$index +1}}</th>
                        <td>{{$wishlist->product_name}}</td>
                        <td ><img style="height: 70px" src="{{$wishlist->image}}" alt=""></td>
                        <td><form action="{{ route('destroyWishlist', ['id' => $wishlist->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="wishlist" value="{{ $wishlist->id }}">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="redirect d-flex flex-row justify-content-between">
                <a href="/" class="btn btn-warning">Về trang chủ</a>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{$wishlists->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>

</div>