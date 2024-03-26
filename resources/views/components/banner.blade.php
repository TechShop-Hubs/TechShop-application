<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators color-black">
        <button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Carousel Slide 2"></button>
        <button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    <!-- Check button banner is clicked -->
    @php
    $url = 'assets/images/banner-';
    $fileExtension = '.webp';
    $bannerName = '';

    if (request()->has('carousel-control-prev-icon')) {
    $bannerName = $url . 'oppo' . $fileExtension;
    } elseif (request()->has('carousel-control-next-icon')) {
    $bannerName = $url . 'samsung'. $fileExtension;
    } else {
    $bannerName = $url .'iphone13' . $fileExtension;
    }
    @endphp
    <!-- Banner -->
    <div class="carousel-inner">
        <!-- banner1 -->
        <div class="carousel-item active">
            <div class="d-flex flex-row gap-5 justify-content-center align-items-center pt-0 pb-5">
                <div class="d-flex justify-content-between mt-2">
                    <div class="mt-5 pt-5 pe-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="btn btn-outline-success bi bi-arrow-left-circle ms-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                        </svg>
                    </div>
                    <div class="">
                        <img class="rounded" style="width: 1000px;" src="{{ asset($bannerName) }}">
                    </div>
                    <div class="mt-5 pt-5 ps-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="btn btn-outline-success bi bi-arrow-right-circle me-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner2 -->
        <div class="carousel-item">
            <div class="d-flex flex-row gap-5 justify-content-center align-items-center pt-0 pb-5">
                <div class="d-flex justify-content-between mt-2">
                    <div class="mt-5 pt-5 pe-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="btn btn-outline-success bi bi-arrow-left-circle ms-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                        </svg>
                    </div>
                    <div class="">
                        <img class="rounded" style="width: 1000px;" src="{{ asset($bannerName) }}">
                    </div>
                    <div class="mt-5 pt-5 ps-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="btn btn-outline-success bi bi-arrow-right-circle me-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner3 -->
        <div class="carousel-item">
            <div class="d-flex flex-row gap-5 justify-content-center align-items-center pt-0 pb-5">
                <div class="d-flex justify-content-between mt-2">
                    <div class="mt-5 pt-5 pe-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="btn btn-outline-success bi bi-arrow-left-circle ms-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                        </svg>
                    </div>
                    <div class="">
                        <img class="rounded" style="width: 1000px;" src="{{ asset($bannerName) }}">
                    </div>
                    <div class="mt-5 pt-5 ps-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="btn btn-outline-success bi bi-arrow-right-circle me-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>