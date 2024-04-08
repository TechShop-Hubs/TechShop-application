<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<div class="container-fluid pt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th class="col">Hình ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th class="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>
@include('layouts.footer')