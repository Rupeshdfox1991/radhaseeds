<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <title>Agro Hi-Tech Chemicals</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend_assets/favicon_io/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend_assets/favicon_io/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend_assets/favicon_io/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend_assets/favicon_io/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('frontend_assets/favicon_io/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('frontend_assets/favicon_io/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('frontend_assets/favicon_io/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('frontend_assets/favicon_io/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('frontend_assets/favicon_io/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('frontend_assets/favicon_io/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend_assets/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('frontend_assets/favicon_io/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend_assets/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend_assets/favicon_io/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('frontend_assets/favicon_io/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!--Boostrap Core Css Start-->
    <link href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend_assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!--Boostrap Core Css end-->
    <!--Google Font Css Start-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!--Google Font Css end-->
    <!--External Core Css start-->
    <link href="{{ asset('frontend_assets/css/default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend_assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend_assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend_assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend_assets/css/animate.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend_assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend_assets/css/ionicon.min.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend_assets/css/responsive-tabs.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend_assets/css/intlTelInput.css') }}" />
    <link rel="stylesheet" type="text/css" media="all"
        href="{{ asset('frontend_assets/css/bootstrap-select.min.css') }}" />

</head>

<body>
    <header class="header">
        <div class="container">
            <div class="wrapper">
                <div class="header-item-left"> <a href="{{ url('/') }}" class="brand"> <img
                            src="{{ asset('frontend_assets/images/logo.png') }}" alt=""> </a> </div>
                <!-- Section: Navbar Menu -->
                <div class="header-item-center">
                    <div class="header-top">
                        <ul>
                            <li><a href="mailto:agrohitechc3@gmail.com"><i class="fa fa-envelope"
                                        aria-hidden="true"></i>agrohitechc3@gmail.com</a></li>
                            <li><a
                                    href="https://api.whatsapp.com/send?phone=919422875726&amp;text=Hello Team Agro Hi-Tech Chemicals"><i
                                        class="fa fa-whatsapp" aria-hidden="true"></i>+91 94228 75726</a></li>

                        </ul>
                    </div>
                    <div class="overlay"></div>
                    <nav class="menu">
                        <div class="menu-mobile-header">
                            <button type="button" class="menu-mobile-arrow"> <i class="ion ion-ios-arrow-back"></i>
                            </button>
                            <div class="menu-mobile-title"></div>
                            <button type="button" class="menu-mobile-close"> <i class="ion ion-ios-close"></i> </button>
                        </div>
                        <ul class="menu-section">
                            <li> <a href="{{ url('/') }}">Home</a> </li>
                            <li> <a href="{{ route('about') }}">About Us</a> </li>
                            @if (count(getMenu()))
                            <li class="menu-item-has-children"> <a href="{{ route('product-category') }}">Products <i
                                        class="ion ion-ios-arrow-down"></i> </a>
                                <div class="menu-subs menu-column-1">
                                    <ul>
                                        @foreach (getMenu() as $menu)
                                        <li><a href="{{ route('product-listing', $menu->slug) }}">{{$menu->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endif
                            <li> <a href="{{ route('gallery') }}">Gallery</a> </li>
                            <li> <a href="{{ route('blogs') }}">Blog</a> </li>
                            <li> <a href="{{ route('careers') }}">Carrers</a> </li>
                            <li> <a href="{{ route('contact-us') }}" class="contact">Contact Us</a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-item-right">
                    <button type="button" class="menu-mobile-trigger"> <span></span> <span></span> <span></span>
                        <span></span> </button>
                </div>
            </div>
        </div>
    </header>