<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ ($title ?? 'Radha Seeds') }} | Radha seeds</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/default.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/lightbox.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
</head>

<body>
    <header class="header">
        <div class="top-heaed">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <ul>
                            <li><a href="mailto:info@agrohitechchemicals.com"><i
                                        class="fa-solid fa-envelope"></i>info@agrohitechchemicals.com</a></li>
                            <li><a
                                    href="https://api.whatsapp.com/send?phone=919422875726&amp;text=Hello Team Agro Hi-Tech Chemicals"><i
                                        class="fa-brands fa-whatsapp"></i>+91
                                    94228 75726</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row v-center">
                <div class="header-item item-left">
                    <div class="logo">
                        <a href="#"><img src="{{ asset('frontend_assets/images/radha-seeds-logo.png')}}"></a>
                    </div>
                </div>
                <!-- menu start here -->
                <div class="header-item item-center">
                    <div class="menu-overlay"></div>
                    <nav class="menu">
                        <div class="mobile-menu-head">
                            <div class="go-back"><i class="fa fa-angle-left"></i></div>
                            <div class="current-menu-title"></div>
                            <div class="mobile-menu-close">&times;</div>
                        </div>
                        <ul class="menu-main">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about')  }}">About Us</a>
                            </li>
                            @if (count(getMenu()))
                            <li class="menu-item-has-children">
                                <a href="{{ route('product-category') }}">Products <i class="fas fa-angle-down"></i></a>
                                <div class="sub-menu single-column-menu">
                                    <ul>
                                        @foreach (getMenu() as $menu)
                                        <li><a href="{{ route('product-listing', $menu->slug) }}">{{$menu->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('gallery') }}">Gallery</a>
                            </li>
                            <li>
                                <a href="{{ route('careers') }}">Careers</a>
                            </li>
                            <li>
                                <a href="{{ route('blogs') }}">Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us')}}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- menu end here -->
                <div class="header-item item-right">
                    <!-- mobile menu trigger -->
                    <div class="mobile-menu-trigger">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>