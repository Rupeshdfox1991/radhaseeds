@extends('frontend.layout.app')
@section('title', 'Contact-us')
@section('content')
<section class="desktop-banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="8000">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('frontend_assets/images/desktop-banner-1.jpg') }}">
                <div class="product-banner"><img src="{{ asset('frontend_assets/images/banner-product.png') }}"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('frontend_assets/images/desktop-banner-1.jpg') }}">
                <div class="product-banner"><img src="{{ asset('frontend_assets/images/banner-product.png') }}"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span
                class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span>
        </a><a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span
                class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span> </a>
    </div>
</section>
<section class="mobile-banner">
    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" data-interval="8000">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('frontend_assets/images/mobile-banner-1.jpg') }}">
                <div class="product-banner"><img src="{{ asset('frontend_assets/images/banner-product.png') }}"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('frontend_assets/images/mobile-banner-1.jpg') }}">
                <div class="product-banner"><img src="{{ asset('frontend_assets/images/banner-product.png') }}"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"><span
                class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span>
        </a><a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"><span
                class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span> </a>
    </div>
</section>
<section class="home-abt">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6 align-self-center">
                <div class="content">
                    <div class="title-blk-left">
                        <h2><span>Get to Know</span>Agro Hi-Tech Chemicals</h2>
                    </div>
                    <p>Agro Hi-Tech Chemicals is a trusted and reputed manufacturer and exporter in India. Our company
                        has been operating since 2006, with a dedicated R&D center focused on extensive studies and
                        various innovations. We provide a range of agro products, including bio-fertilizers,
                        bio-pesticides, micronutrients, and plant growth regulators (PGR). We believe that customer
                        satisfaction is our primary objective, and we are committed to delivering world-class solutions
                        for our customers' success. We take pride in our ability to quickly adapt to their needs.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="img-sec"><img src="{{ asset('frontend_assets/images/home-abt.png') }}"></div>
            </div>
        </div>
    </div>
</section>
<section class="home-feat-prod">
    <div class="container">
        <div class="row">
            <div class="title-blk-center">
                <h2><span>Checkout Our Products</span>Featured Products</h2>
            </div>
            @foreach ($productData as $product)
            <div class="col-lg-3 col-md-12 col-sm-12 col-xl-3">
                <div class="prod-pane">
                    <div class="img-pane"><img src="{{ asset('product-images') . '/' . $product->image }}"></div>
                    <a href="{{ route('product-details', $product->product_slug) }}">
                        <p>{{ $product->product_name }}</p>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<section class="home-certification">
    <div class="container">
        <div class="row">
            <div class="title-blk-center">
                <h2><span>Prove Our Expertise</span>Certifications</h2>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="certi-pane"><img src="{{ asset('frontend_assets/images/certi-1.jpg') }}"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="certi-pane"><img src="{{ asset('frontend_assets/images/certi-2.jpg') }}"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="certi-pane"><img src="{{ asset('frontend_assets/images/certi-3.jpg') }}"></div>
            </div>
        </div>
    </div>
</section>
<section class="home-blog">
    <div class="container">
        <div class="row">
            <div class="title-blk-center">
                <h2><span>Uncover the Latest Industry Insights</span>Blogs</h2>
            </div>
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="blog-pane">
                    <div class="img-section"><img
                            src="{{ asset('blogs-images/image_thumb') . '/' . $blog->image_thumb }}"></div>
                    <div class="info-sec">
                        <div class="date">{{$blog->created_at->format('M. d Y')}}</div>
                        <h3>{{Str::limit($blog->name, 28)}}</h3>
                        <p>{!!Str::limit($blog->description, 250) !!}</p>
                        <a href="{{ route('blog-details', $blog->slug) }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection