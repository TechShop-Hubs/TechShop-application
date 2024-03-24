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
    {{-- <div class="navbar container-fluid d-flex justify-content-between align-items-center pe-5">
        <button class="btn btn-success btn-lg" type="submit" name="create">Tạo mới</button>
    </div> --}}
    <!-- Hiển thị danh sách sản phẩm -->
    <div class="container-fluid pt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th class="col">Email</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trạng thái</th>
                    <th class="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone_number }}</td>
                        
                        @if ($user->status == 1)
                            <td>Hoạt động</td>
                        @else
                            <td>Không hoạt động</td>
                        @endif
                    
                        <td>
                            <a href="{{ route('detailUser', ['id' => $user->id]) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('updateUser', ['id' => $user->id]) }}" class="btn btn-warning">Cập nhật</a>
                            <a href="#" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị liên kết phân trang -->
        <div class="d-flex justify-content-center align-items-center">
            {{$users->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>
@endsection
