@include('layouts.header')
@include('components.menu')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col">
            <h4><b>Mức Giá</b></h4>
            <input type="checkbox" id="all" name="all" value="Bike" style="">
            <label for="all">
                <h5><b> Tất Cả</b></h5>
            </label><br>

            <input type="checkbox" id="2milion" name="2milion" value="Bike" style="">
            <label for="2milion">
                <h5><b> Dưới 2 Triệu</b></h5>
            </label><br>

            <input type="checkbox" id="4milion" name="4milion" value="Bike" style="">
            <label for="4milion">
                <h5><b> Từ 2 đến 4 triệu</b></h5>
            </label><br>

            <input type="checkbox" id="7milion" name="7milion" value="Bike" style="">
            <label for="7milion">
                <h5><b> Từ 4 đến 7 triệu</b></h5>
            </label><br>

            <input type="checkbox" id="13milion" name="13milion" value="Bike" style="">
            <label for="13milion">
                <h5><b> Từ 7 đến 13 triệu</b></h5>
            </label><br>

            <input type="checkbox" id="over13milion" name="over13milion" value="Bike" style="">
            <label for="over13milion">
                <h5><b> Trên 13 triệu</b></h5>
            </label><br>
        </div>

        <div class="col">
            <div class="row">
                <div class="col">
                    <div>
                        <h3><b>Iphone</b></h3>
                        <p>(10 sản phẩm)</p>
                        <div class="rounded border border-black">
                            <b>
                                <p>Sắp Xếp +</p>
                            </b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- @foreach ( $a as $as) --}}
                    <div class="content-center rounded border border black">
                        <img src="" alt="">
                        <b>
                            <h5>Iphone X series</h5>
                        </b>
                        <p>20.000.000đ</p>

                    </div>

                    {{-- @endforeach --}}
                </div>
                <div></div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')