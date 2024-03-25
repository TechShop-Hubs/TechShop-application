<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<div class="container">
    @include('components.banner')
    <div class=" bg-white rounded border border-black m-3">
        <div class="ms-4 mt-2"><b>
                <p class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>Oppo</p>
            </b></div>
        <div class="row m-3 position-relative">
            @foreach ( $products as $product)
            <!-- Thay thế điều kiện thành các loại iphone-oppo ... khác hay máy tính-điện thoại -->
            @if ($product->name === 'Sản phẩm 4')
            <div class="col-2 m-2 p-0 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <img class="col mt-3 image" style="height:120px;" src="https://photo.znews.vn/w660/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt="">
                        <b class="col">
                            <p class="name">{{$product -> name}}</p>
                        </b>
                        <p class="col">{{$product -> price}}đ</p>
                        <div class="row mb-2">
                            <button class="btn col-5 bg-secondary rounded m-1 p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11M13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0" />
                                    <path d="M10.344 11.742q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1 6.5 6.5 0 0 1-1.398 1.4z" />
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                            <div class="col-6 bg-secondary rounded m-1 ">
                                <div class="row ">
                                    <a class="col btn m-0 pt-2 p-2 pb-2 text-white" href="/home/cart">Thêm vào<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="col  m-0 p-0 bi bi-cart3" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <!-- Iphone -->
    <div class=" bg-white rounded border border-black m-3">
        <div class="ms-4 mt-2"><b>
                <p class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>Iphone</p>
            </b></div>
        <div class="row m-3 position-relative">
            @foreach ( $products as $product)
            <!-- Thay thế điều kiện thành các loại iphone-oppo ... khác hay máy tính-điện thoại -->
            @if ($product->name === 'Sản phẩm 1')
            <div class="col-2 m-2 p-0 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <img class="col mt-3 image" style="height:120px;" src="https://photo.znews.vn/w660/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt="">
                        <b class="col">
                            <p class="name">{{$product -> name}}</p>
                        </b>
                        <p class="col">{{$product -> price}}đ</p>
                        <div class="row mb-2">
                            <button class="btn col-5 bg-secondary rounded m-1 p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11M13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0" />
                                    <path d="M10.344 11.742q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1 6.5 6.5 0 0 1-1.398 1.4z" />
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                            <div class="col-6 bg-secondary rounded m-1 ">
                                <div class="row ">
                                    <a class="col btn m-0 pt-2 p-2 pb-2 text-white" href="/home/cart">Thêm vào<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="col  m-0 p-0 bi bi-cart3" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <!-- Realme -->
    <div class=" bg-white rounded border border-black m-3">
        <div class="ms-4 mt-2"><b>
                <p class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>Realme</p>
            </b></div>
        <div class="row m-3 position-relative">
            @foreach ( $products as $product)
            <!-- Thay thế điều kiện thành các loại iphone-oppo ... khác hay máy tính-điện thoại -->
            @if ($product->name === 'Sản phẩm 2')
            <div class="col-2 m-2 p-0 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <img class="col mt-3 image" style="height:120px;" src="https://photo.znews.vn/w660/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt="">
                        <b class="col">
                            <p class="name">{{$product -> name}}</p>
                        </b>
                        <p class="col">{{$product -> price}}đ</p>
                        <div class="row mb-2">
                            <button class="btn col-5 bg-secondary rounded m-1 p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11M13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0" />
                                    <path d="M10.344 11.742q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1 6.5 6.5 0 0 1-1.398 1.4z" />
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                            <div class="col-6 bg-secondary rounded m-1 ">
                                <div class="row ">
                                    <a class="col btn m-0 pt-2 p-2 pb-2 text-white" href="/home/cart">Thêm vào<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="col  m-0 p-0 bi bi-cart3" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>