<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechShop - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/blocks.css') }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>

<body>
    @include('admin.blocks.header')
    <main>
        <div class="row" id="container">
            <div class="col-2">
                <aside>
                    @section('sidebar')
                        @include('admin.blocks.sidebar')
                    @show
                </aside>
            </div>
            <div class="col-10">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    {{-- @include('admin.blocks.footer') --}}
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/blocks.js') }}"></script>
    @yield('js')
</body>

</html>
