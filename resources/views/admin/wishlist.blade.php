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
    {{-- nav --}}
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <!-- Hiển thị danh sách sản phẩm -->
    <div class="container-fluid pt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Sản phẩm đã thích</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishlists as $index => $wishlist)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $wishlist->user_name }}</td>
                        <td>{{ $wishlist->product_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center align-items-center">
            {{ $wishlists->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>
@endsection
