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

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <span class="navbar-toggler-icon d-sm-none" id="sidebar-toggle"></span>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto d-none d-sm-block d-md-block">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect small" href="{{ url()->previous() }}"><i class="fas fa-arrow-left pl-3 pr-3"></i>
                            <span class="sr-only"></span>
                        </a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" data-toggle="modal"  data-target="#support" class="nav-link waves-effect" >--}}
{{--                            <i class="fas fa-info-circle"></i>--}}
{{--                        </a>--}}
{{--                        @include('modals.support')--}}

{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="#" data-toggle="modal" data-target="#notificationModal" class="nav-link waves-effect" >
                            <i class="fas fa-bell"></i>
                            @if(count(auth()->user()->unreadNotifications) > 0)
                                <span class="badge badge-pill badge-danger float-right">
                                    {{ count(auth()->user()->unreadNotifications) }}</span>
                            @endif
                        </a>
                        @include('modals.notifications')

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link waves-effect" >
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="sureBtn()" class="nav-link waves-effect" >
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    @can('admin')
        @include('admin.menu')
    @endcan
    @can('clinic')
        @include('clinic.menu')
    @endcan
    @can('doctor')
        @include('doctor.menu')
    @endcan
    <!-- Sidebar -->

</header>

<!-- Main -->
<main class="pt-5 mb-5 mx-lg-5">

    @yield('content')

</main>
<!-- Main -->

<!--Footer-->
<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn " >
    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="http://bandageapp.com" target="_blank">Bandage </a>
        - Design & Developed by:
        <a href="https://xband.io" target="_blank">xBand</a>
    </div>
    <!--/.Copyright-->
</footer>
<!--/.Footer-->
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
<script>
    function sureBtn(form) {
        let res = confirm('are you sure ?');
        if(res === true)
            form.submit();
    }

    setTimeout(function () {
        $('#sideModalTRSuccess').modal('show');
        $('#sideModalTRDanger').modal('show');
        $("#sidebar-toggle").click(function () {
            $(".sidebar-fixed").show()
        });
        $("#sidebar-close").click(function () {
            $(".sidebar-fixed").hide()
        })
    },500);

    setTimeout(function () {
        $('body').click(function (event)
        {
            if(!$(event.target).closest('#openModal').length && !$(event.target).is('#openModal')) {
                $("#sideModalTRDanger").hide();
                $("#sideModalTRSuccess").hide();
            }
        });
    },3000);

    $("#sidebar-toggle").click(function () {
        $(".sidebar-fixed").show()
    });


    // $('#inbox').animate({ scrollBotton: document.getElementById('inbox').scrollHeight }, "slow");

    function dismiss() {
        $('#guide').hide()
    }
</script>
@yield('script')
</html>
