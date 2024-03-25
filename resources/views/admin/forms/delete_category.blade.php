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
    <div class="btn btn-success mt-4 p-3"  ><a class="text-decoration-none text-white" href="{{route('categories')}}">Về danh sách</a></div>
    <h3 class="pt-5">Bạn có chắc chắn muốn xóa sản phẩm này</h3>
    <div class="data">
        <table>
            <thead>
                <tr>
                    <th>Loại</th>
                    <th>Hãng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $category->kind }}</th>
               
                    <td>{{ $category->brand }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <form action="" method="post">
        @csrf
        <input type="hidden" name="delete" >
        <input type="hidden" name="id" value="{{$category->id}}">
        <button class="btn btn-warning" type="submit">Xóa</button>
        <button class="btn btn-secondary "><a class="text-decoration-none text-white" href="/admin/category">Hủy</a></button>
    </form>

@endsection
