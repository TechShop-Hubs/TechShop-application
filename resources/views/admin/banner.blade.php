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
    <div class="navbar container-fluid d-flex justify-content-between align-items-center pe-5">
        <button class="btn btn-success btn-lg" ><a href="banner/create" class="text-decoration-none text-white">Tạo mới</a></button>
    </div>
    <!-- Hiển thị danh sách sản phẩm -->
    <div class="container-fluid pt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th class="col">Chủ đề</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Trạng thái</th>
                    <th class="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $index => $banner)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $banner->name }}</td>
                        <td><img src="{{ asset('banner/'.$banner->image) }}" alt="img" style="max-width: 100%"></td>
                        <td>{{ $banner->status==1? 'Đang hiển thị' : 'Không hiển thị' }}</td>
                        <td>
                            <a href="banner/update/{{$banner->id}}" class="btn btn-warning">Cập nhật</a>
                            <a href="banner/delete/{{$banner->id}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Hiển thị liên kết phân trang -->
        <div class="d-flex justify-content-center align-items-center">
            {{$banners->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>
@endsection
