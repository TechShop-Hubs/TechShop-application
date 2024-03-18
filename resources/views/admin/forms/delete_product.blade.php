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
    <div class="btn btn-success mt-4 p-3"  ><a class="text-decoration-none text-white" href="/api/admin/product">Về danh sách</a></div>
    <h3 class="pt-5">Bạn có chắc chắn muốn xóa sản phẩm này</h3>
    <div class="data">
        <table>
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $product->name }}</th>
               
                    <td>{{ $product->price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <form action="" method="post">
        @csrf
        <input type="hidden" name="delete">
        <button class="btn btn-warning" type="submit">Xóa</button>
        <button class="btn btn-secondary "><a class="text-decoration-none text-white" href="/api/admin/product">Hủy</a></button>
    </form>

@endsection
