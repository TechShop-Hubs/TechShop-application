{{-- <title>{{ $data['title'] }}</title> --}}

@include('layouts.header')
@include('components.menu')
<div class="container">
    <div class="d-flex justify-content-around">
        <form class="col-2">
            @csrf
            @method('post')
            <h4><b>Mức Giá</b></h4>
            <input type="checkbox" id="all" name="filters[]" value="all" onclick="addFilter('all')">
            <label for="all">
                <h5><b> Tất Cả</b></h5>
            </label><br>

            <input type="checkbox" id="2milion" name="filters[]" value="1000000" onclick="addFilter('2milion')">
            <label for="2milion">
                <h5><b> Dưới 2 Triệu</b></h5>
            </label><br>

            <input type="checkbox" id="4milion" name="filters[]" value="4000000" onclick="addFilter('4milion')">
            <label for="4milion">
                <h5><b> Từ 2 đến 4 triệu</b></h5>
            </label><br>

            <input type="checkbox" id="7milion" name="filters[]" value="7000000" onclick="addFilter('7milion')">
            <label for="7milion">
                <h5><b> Từ 4 đến 7 triệu</b></h5>
            </label><br>

            <input type="checkbox" id="13milion" name="filters[]" value="13000000" onclick="addFilter('13milion')">
            <label for="13milion">
                <h5><b> Từ 7 đến 13 triệu</b></h5>
            </label><br>

            <input type="checkbox" id="over13milion" name="filters[]" value="14000000" onclick="addFilter('over13milion')">
            <label for="over13milion">
                <h5><b> Trên 13 triệu</b></h5>
            </label><br>
            <button class="col-11 btn btn-outline-warning mt-2" type="submit">Tìm Kiếm</button>
        </form>

        <div class="col-9 border border-secondary rounded ">
            @foreach ($products as $product)
            <div class="row">
                <div class="d-flex justify-content-between">
                    <div class="d-flex m-3">
                        <h3>{{$product -> name}}</h3>
                        <p class="mt-2 ms-2">({{$product -> quantity_product}} Sản Phẩm)</p>
                    </div>
                </div>
            </div>
            <div class="row m-3 gap-2">
                <div class="col-12 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10 ">
                    <div class="row d-flex justify-content-center ">
                        <div class="col-12 text-center ">
                            <img class="col mt-3 image" style="height:250px;" src="{{$product->image}}" alt="">
                            <b class="col">
                                <p class="name">{{$product -> name}}</p>
                            </b>
                            <p class="col">{{$product -> price}}đ</p>
                            <p class="col">{{$product -> describe_product}}</p>
                            <div class="row mb-2">
                                <a class="btn col-5 bg-secondary rounded m-1 p-0" style="display: flex; justify-content: center; align-items: center;" href="/detail_product/{{ $product->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11M13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0" />
                                        <path d="M10.344 11.742q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1 6.5 6.5 0 0 1-1.398 1.4z" />
                                        <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </a>
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
            </div>
            <br>
            <hr>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')
