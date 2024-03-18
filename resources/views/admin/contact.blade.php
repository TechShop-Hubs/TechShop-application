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

    <!-- Hiển thị danh sách sản phẩm -->
    <div class="container-fluid pt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th class="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th class="col">Trạng thái</th>
                    <th class="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index => $contact)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $contact->user_name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->status}}</td>
                        <td>
                            <a href="contact/update/{{$contact->id}}" class="btn btn-warning">Cập nhật</a>
                            <a href="contact/delete/{{$contact->id}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Hiển thị liên kết phân trang -->
        <div class="d-flex justify-content-center align-items-center">
            {{$contacts->onEachSide(1)->links('admin.blocks.paginator') }}
        </div>
    </div>
@endsection
