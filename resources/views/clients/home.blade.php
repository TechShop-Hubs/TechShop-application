@include('layouts.header')
@include('components.menu')
<div class="container">
    @include('components.banner')
    <div class=" bg-white rounded border border-black ">
        <div class="ms-4 mt-2"><b>
                <p class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>Điện Thoại Nổi Bật</p>
            </b></div>
        <div class="row m-3 position-relative">
            {{-- @foreach ( ) --}}
            <div class="col-2 m-2 p-0 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <img class="col mt-3 image" style="height:120px;" src="https://photo.znews.vn/w660/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt="">
                        <b class="col">
                            <p class="name">Iphone</p>
                        </b>
                        <p class="col">100.00đ</p>
                        <div class="row mb-2">
                            <div class="col-5 bg-secondary rounded m-1 p-0">
                                <img class="pt-3" src="/assets/images/zoom_in.png" alt="">
                            </div>
                            <div class="col-6 bg-secondary rounded m-1 ">
                                <div class="row ">
                                    <p class="col m-0 pt-2 p-0 pb-2">Thêm vào</p>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="col mt-3 m-0 p-0 bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
            <!-- <div class="col position-absolute top-50 start-100 translate-middle">
                <img src="/assets/images/keyboard_arrow_right.png" alt="" style="height:50px;">
            </div> -->
        </div>
    </div>

    <!-- Khuyến mãi  -->
    <div class="bg-white rounded border border-black mt-5">
        <div class="ms-4 mt-2"><b>
                <p class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>Khuyễn Mãi Hot</p>
            </b></div>
        <div class="row m-3 position-relative">
            {{-- @foreach ( ) --}}
            <div class="col-2 m-2 p-0 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <img class="col mt-3 image" style="height:120px;" src="https://photo.znews.vn/w660/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt="">
                        <b class="col">
                            <p class="name">Iphone</p>
                        </b>
                        <p class="col">100.00đ</p>
                        <div class="row mb-2">
                            <div class="col-5 bg-secondary rounded m-1 p-0">
                                <img class="pt-3" src="/assets/images/zoom_in.png" alt="">
                            </div>
                            <div class="col-6 bg-secondary rounded m-1 ">
                                <div class="row ">
                                    <p class="col m-0 pt-2 p-0 pb-2">Thêm vào</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="col mt-3 m-0 p-0 bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>
@include('layouts.footer')