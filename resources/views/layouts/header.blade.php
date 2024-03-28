<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="row bg-dark bg-gradient text-white mt-4 m-0 p-0 ">
    <div class="col m-2">
        <a href="/"><img src="/assets/images/logo.png" alt="" style="height:60px;"></a>
    </div>
    <input class="col-5 m-3 rounded" type="text" name="search" id="" placeholder="Nhập Thứ Cần Tìm...">
    <button class="col-1 m-3 rounded bg-warning bg-gradient bg-opacity-60 m-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search mt-1" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
        </svg>
    </button>
    <div class="col mt-3 m-2 p-0 ms-5 ps-5 d-flex justity-content-center align-items-center gap-3">
        <b>
            @if(session('logged_in'))
                <h5><span class="text-white">{{ session('user_name') }}</span></h5>
            @else
                <h5><a class="text-white" href="/login" style="text-decoration: none">Đăng Nhập</a></h5>
            @endif
        </b>
        <h5><a class="text-white" href="/contact" style="text-decoration: none">Liên Hệ</a></h5>
    </div>
    <div class="col mt-3 m-2 p-0">
        <a href="/cart" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
            </svg></a>
    </div>
</div>
