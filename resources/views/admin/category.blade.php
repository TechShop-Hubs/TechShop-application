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
        <button class="btn btn-success btn-lg" type="submit" name="create">
            <a class="text-decoration-none text-white" href="{{route('createCategory')}}">Tạo mới</a>
        </button>
        @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
        @if (session('err'))
        <div class="alert alert-danger">{{ session('err') }}</div>
    @endif
    </div>
    <!-- Hiển thị danh sách sản phẩm -->
    <div class="container-fluid pt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Hãng</th>
                    <th class="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->kind }}</td>
                        <td>{{ $category->brand }}</td>
                        <td>
                            <a href="{{route('updateCategory',['id'=>$category->id])}}" class="btn btn-warning">Cập nhật</a>
                            <a href="{{route('deleteCategory',['id'=>$category->id])}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị liên kết phân trang -->
        <div class="d-flex justify-content-center align-items-center">
            {{$categories->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>
@endsection
