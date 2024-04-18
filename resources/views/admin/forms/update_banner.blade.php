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
    <div class="btn btn-success mt-4 p-3"  ><a class="text-decoration-none text-white" href="{{route('banner')}}">Về danh sách</a></div>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4 border mt-5 d-flex flex-column gap-5">
                <h2>Sửa banner</h2>
                <div class="form-group">
                    <label for="name">Tên chủ đề</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Tên chủ đề" value="{{ $banner->name }}">
                    @error('name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" {{ "1" == $banner->status ? 'selected' : ''}}>Hiển thị</option>
                        <option value="0" {{ "0" == $banner->status ? 'selected' : ''}}>Không hiển thị</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh cũ</label>
                    <input type="text" class="form-control mb-3" name="oldImage" value="{{ $banner->image }}">
                    <img src="{{ asset('banner/'.$banner->image) }}" alt="img" style="max-width: 30rem">
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" class="form-control" accept="image/*" name="image" id="image" onchange="previewImage()" placeholder="Vui lòng chọn hình ảnh" value="{{ $banner->image }}">
                    <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 30rem; max-height: 200px;" class="mt-3">
                    @error('image')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
<script>
    function previewImage() {
        var preview = document.querySelector('#imagePreview');
        var file = document.querySelector('#image').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
