<!DOCTYPE html>
<html>
<head>
    <title>Piterson Costa Test</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <link href="{{ asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">


    @stack('plugin-styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body data-base-url="{{url('/')}}">

<div class="container-scroller" id="app">
    @include('layout.header')
    <div class="container-fluid page-body-wrapper">
        @include('layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" ></script>


<!-- plugin js -->
@stack('plugin-scripts')
<!-- end plugin js -->

<!-- common js -->

<script src="{{ asset('assets/js/off-canvas.js') }}" ></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}" ></script>
<script src="{{ asset('assets/js/misc.js') }}" ></script>
<script src="{{ asset('assets/js/settings.js') }}" ></script>
<script src="{{ asset('assets/js/todolist.js') }}" ></script>

<!-- end common js -->
@stack('custom-scripts')
</body>
</html>
