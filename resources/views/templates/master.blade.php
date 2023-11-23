<!DOCTYPE html>
<html lang="en">
    <head>
        @php
            $title = app()->view->getSections()['title'];
        @endphp
        <title>{{ ucfirst($title) }}</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="icon" href="{{ asset('/images/chatterbox.png') }}">
    </head>
    <body>
        <a href="{{ url()->previous() }}"><i class="fixed-bottom h1 m-2 p-2 fas fa-arrow-alt-circle-left button"></i></a>
        @yield('body')
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>