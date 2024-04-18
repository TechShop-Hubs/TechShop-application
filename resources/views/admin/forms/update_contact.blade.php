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
    <div class="btn btn-success mt-4 p-3"><a class="text-decoration-none text-white" href="{{ route('contact') }}">Về danh
            sách</a></div>

    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-4 border mt-5 d-flex flex-column gap-5">
                <h2>Chỉnh sửa thông tin</h2>
                <div class="form-control">
                    <label for="name">Người liên hệ</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Tên liên hệ"
                        value="{{ $contact->user_name }}" disabled>
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="" placeholder="email"
                        value="{{ $contact->email }}" disabled>
                </div>
                <div class="form-control">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" id="" placeholder="Phone"
                        value="{{ $contact->phone }}" disabled>
                </div>
                <div class="form-control">
                    <label for="phone">Trạng thái</label>
                    {{-- @php
                        $data = $contact->status == 0 ? 'Chưa liên hệ' : 'Đã liên hệ';
                    @endphp --}}

                    <select name="status" id="">
                        <option value="0" {{ $contact->status == 0 ? 'selected' : '' }}>Chưa liên hệ</option>
                        <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Đã liên hệ</option>
                    </select>

                </div>
                <input type="hidden" name="id" value="{{ $contact->id }}">
                <button class="btn btn-success" type="submit">Sửa</button>

            </div>
        </div>
    </form>
@endsection
