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

    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-4 border mt-5 d-flex flex-column gap-5">
                <h2>Sửa danh mục</h2>
                <label for="kind">Loại</label>
                <input type="text" class="form-control" name="kind" id="" placeholder="Loại danh mục" value="{{$category->kind}}" >
                <label for="brand">Hãng</label>
                <input type="text" class="form-control" name="brand" id="" placeholder="Hãng" value="{{$category->brand}}" >
                <input type="hidden" name="id" value="{{$category->id}}">
                <button class="btn btn-success" type="submit">Sửa</button>

            </div>
        </div>
    </form>
@endsection