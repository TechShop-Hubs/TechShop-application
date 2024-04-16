<title>{{ $data['title'] }}</title>
@include('layouts.header')
@include('components.menu')
<link rel="stylesheet" href="{{ asset('assets/css/history_order.css') }}">

<div class="p-2">
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</div>
<div class="container-fluid ps-5 pe-5">
    <h1>Các sản phẩm trong đơn hàng</h1>
    <table class="table table-bordered border-primary">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($orderItems as $item)
                <tr>
                    <th scope="row">{{ $count++ }}</th>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->total_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
