<title>{{ $data['title'] }}</title>
@include('layouts.header')
<div class="p-2">
    <a href="/" class="btn btn-info">Về trang chủ</a>
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</div>
<div class="container d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-center align-items-center">
        <form action="" method="post" class="w-50">
            @csrf
            <h2 class="mb-4">Form Liên hệ</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name ?? old('name') }}">
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email ?? old('email') }}">
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone_number ?? old('phone') }}">
                @error('phone')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">  
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="4" cols="50">{{ old('message') }}</textarea>
                @error('message')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>


@include('layouts.footer')
