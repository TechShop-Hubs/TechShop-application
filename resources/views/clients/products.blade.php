<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<div class="container-fluid">
    <div class="d-flex">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="text-decoration-none text-dark" href="/clients/products">Tất cả sản phẩm</a></li>
                        @foreach ($kinds as $kind)
                        <li class="list-group-item">
                            <a class="dropdown-toggle text-decoration-none text-dark " href="#" role="button" id="{{ $kind->kind }}Dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $kind->kind }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="{{ $kind->kind }}Dropdown">
                                @foreach ($brandsByKind[$kind->kind] as $item)
                                <li><a class="dropdown-item" href="/clients/products?kind={{ $kind->kind }}&brand={{$item->brand}}">{{$item->brand}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>        
        <div class="col-md-10">
            <div class="row m-3 position-relative">
                @foreach ( $products as $product)
                <div class="col-2 m-2 p-0 d-flex justify-content-center border border-black rounded bg-warning bg-opacity-10">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 text-center">
                            <img class="col mt-3 image bg-transparent" style="height:120px;" src="{{$product->image}}" alt="">
                            <b class="">
                                <p class="name">{{$product -> name}}</p>
                            </b>
                            <p class="">{{$product -> price}}đ</p>
                            <p class="col bg-danger text-white rounded m-2">Giảm giá lên đến:{{$product -> discount}}%</p>
                        </div>
                        <div class="row mb-2">
                            <a class="btn col-5 bg-secondary rounded m-1 p-0 justify-content-center d-flex align-items-center" href="/detail_product/{{ $product->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11M13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0" />
                                    <path
                                        d="M10.344 11.742q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1 6.5 6.5 0 0 1-1.398 1.4z" />
                                    <path fill-rule="evenodd"
                                        d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </a>
                            <div class="col-6 bg-success rounded m-1 ">
                                <form action="{{ route('postCart', ['id' => $product->id]) }}" method="post">
                                    @csrf
                                    <button class="col btn m-0 pt-2 p-2 pb-2 text-white">Thêm vào<svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="col  m-0 p-0 bi bi-cart3" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                        </svg></button>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
        
                @endforeach
            </div>
        </div>
    </div>
</div>
