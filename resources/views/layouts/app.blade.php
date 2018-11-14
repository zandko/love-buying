<!DOCTYPE html>
<html lang="en">

<head>

    {{--基本页面需求--}}
    <meta charset="utf-8">
    <meta name="keywords"
          content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates"/>
    <meta name="description"
          content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project."/>
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow"/>

    {{--CSRF--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Mobile specific metas--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>@yield('title', 'loveBuying') - 爱购网</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--Favicon--}}
    <link rel="shortcut icon" type="image/png" href="/ico/favicon-16x16.png"/>

    {{--Libs CSS--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themecss/lib.css') }}" rel="stylesheet">
    <link href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/minicolors/miniColors.css') }}" rel="stylesheet">

    {{--主题 CSS--}}
    <link href="{{ asset('css/themecss/so_searchpro.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themecss/so_megamenu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themecss/so-categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themecss/so-category-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themecss/so-newletter-popup.css') }}" rel="stylesheet">

    <link href="{{ asset('css/footer/footer1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header/header1.css') }}" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    {{-- Google web fonts --}}
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>
@if(route_class() == 'pages-index')
    <body class="common-home res layout-1">

    <div id="wrapper" class="wrapper-fluid banners-effect-3">
        @else
            <body class="res layout-1">

            <div id="wrapper" class="wrapper-fluid banners-effect-5">
                @endif
                <div id="app">
                    @include('layouts._header')
                    @yield('content')
                    @include('layouts._footer')
                </div>
            </div>

            <script src="{{ asset('js/app.js') }}"></script>

            {{--包括LIBS和插件--}}
            <script type="text/javascript" src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/owl-carousel/owl.carousel.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/slick-slider/slick.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/themejs/libs.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/unveil/jquery.unveil.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/countdown/jquery.countdown.min.js') }}"></script>
            <script type="text/javascript"
                    src="{{ asset('js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/datetimepicker/moment.js') }}"></script>
            <script type="text/javascript"
                    src="{{ asset('js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/modernizr/modernizr-2.6.2.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/minicolors/jquery.miniColors.min.js') }}"></script>

            {{--主题文件--}}
            <script type="text/javascript" src="{{ asset('js/themejs/application.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/themejs/homepage.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/themejs/toppanel.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/themejs/so_megamenu.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/themejs/addtocart.js') }}"></script>


            @yield('scriptsAfterJs')

            </body>

</html>