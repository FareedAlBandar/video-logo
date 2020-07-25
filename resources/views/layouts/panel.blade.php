<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bandage') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('panel/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('panel/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('panel/css/style.min.css') }}" rel="stylesheet">
    <style>
        footer {
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 10;
            /*position: relative ;*/
            /*position: fixed;*/
            /*left: 0;*/
            /*bottom: 0;*/
            /*width: 100%;*/
            /*text-align: center;*/
        }
        textarea {
            border:solid 1px black;
        }
        @media only screen and (max-width: 600px) {
            textarea {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div id="app">

<header>

</header>

<!-- Main -->
<main class="pt-5 mb-5 mx-lg-5">

    @yield('content')

</main>
<!-- Main -->

</div>
</body>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('panel/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('panel/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('panel/js/bootstrap.') }}min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('panel/js/mdb.min.js') }}"></script>
@yield('script')
</html>
