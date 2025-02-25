@extends('frontend.layout.app')
@section('title', 'About-us')
@section('content')
<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/about-us-breadcrumb-bg.jpg');}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>About Us</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-first">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="title-blk-center">
                    <h2><span>Facts of disablity Farmers</span>We are Committed to Helping<br>
                        Our Farmers Succeed.</h2>
                </div>
                <p>Agro Hi-Tech Chemicals is a trusted and reputed manufacturer and exporter in India. Our company has
                    been operating since 2006, with a dedicated R&D center focused on extensive studies and various
                    innovations. We provide a range of agro products, including bio-fertilizers, bio-pesticides,
                    micronutrients, and plant growth regulators (PGR). We believe that customer satisfaction is our
                    primary objective, and we are committed to delivering world-class solutions for our customers'
                    success. We take pride in our ability to quickly adapt to their needs.</p>
                <div class="four-box-content">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="count black1">95</div>
                            <span>Lorem Ipsum</span>
                        </div>
                        <div class="box">
                            <div class="count black">60M</div>
                            <span>Lorem Ipsum</span>
                        </div>
                        <div class="box">
                            <div class="count black">120</div>
                            <span>Lorem Ipsum</span>
                        </div>
                        <div class="box">
                            <div class="count black">440</div>
                            <span>Lorem Ipsum</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="vision-mission">
    <div class="vm-content bg1">
        <div class="icon-pane"><img src="{{ asset('frontend_assets/images/mission-1.png') }}"></div>
        <h3>Mission</h3>
        <p>To provide innovative and sustainable agro solutions that enhance agricultural productivity and contribute to
            a healthier environment. We are committed to exceeding customer expectations through cutting-edge research,
            quality products, and exceptional service, ensuring the success of farmers and agricultural businesses
            worldwide.</p>
    </div>
    <div class="vm-content bg2">
        <div class="icon-pane"><img src="{{ asset('frontend_assets/images/vision-1.png') }}"></div>
        <h3>Vision</h3>
        <p>To be the global leader in agricultural solutions, empowering farmers with advanced technologies and
            sustainable practices that drive growth, preserve natural resources, and secure the future of agriculture.
            We envision a world where every farmer can achieve maximum productivity while nurturing the earth for
            generations to come.</p>
    </div>
</section>
@endsection