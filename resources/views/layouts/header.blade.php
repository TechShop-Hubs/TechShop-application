<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/client.css')}}">
</head>
<div class="row bg-dark bg-gradient text-white mt-4 m-0 p-0 ">
    <div class="col m-2">
        <a href="/"><img src="/assets/images/logo.png" alt="" style="height:60px;"></a>
    </div>
    <input class="col-5 m-3 rounded" type="text" name="search" id="" placeholder="Nhập Thứ Cần Tìm...">
    <button class="col-1 m-3 rounded bg-warning bg-gradient bg-opacity-60 m-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
            class="bi bi-search mt-1" viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
        </svg>
    </button>
    <div class="col-2 mt-3 m-2 p-0 d-flex justity-content-center align-items-center gap-3">
        <b>
            @if (session('logged_in'))
                <h5><span class="text-white">{{ session('user_name') }}</span></h5>
            @else
                <h5><a class="text-white" href="/login" style="text-decoration: none">Đăng Nhập</a></h5>
            @endif
        </b>
        <h5><a class="text-white" href="/contact" style="text-decoration: none">Liên Hệ</a></h5>
    </div>
    <div class="col mt-3 m-2 p-0">
        <a href="/cart" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                <path
                    d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
            </svg></a>
        <a href="/history_order"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                viewBox="0 0 512 512">
                <path fill="#ffffff"
                    d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z" />
            </svg></a>
    </div>
    @if (session('logged_in'))
        <div class="col mt-4 m-2 p-0">
            <h5><a class="text-white" href="/logout" style="text-decoration: none">Đăng xuất</a></h5>
        </div>  
    @endif
</div>
