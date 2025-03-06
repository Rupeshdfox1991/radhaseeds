@extends('frontend.layout.app')
@section('title', 'Contact-us')
@section('content')
<section class="banner-sec">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('frontend_assets/images/banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/banner-img.jpg')}}"></div>
        </div>

        <!-- Navigation buttons -->
        <div class=" swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</section>

<section class="mob-banner-sec">
    <div class="swiper mySwiper1">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('frontend_assets/images/mob-banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/mob-banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/mob-banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/mob-banner-img.jpg')}}"></div>
            <div class=" swiper-slide"><img src="{{ asset('frontend_assets/images/mob-banner-img.jpg')}}"></div>
        </div>

        <!-- Navigation buttons -->
        <div class=" swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</section>

<section class="tawts">
    <div class="content-pane">
        <div class="detail-cont">
            <div class="left-content">
                <div class="title-red-left">
                    <h2>Transforming Agriculture with Trusted Seeds</h2>
                </div>
                <p>At Radha Seeds, we specialize in providing premium-quality vegetable and crop seeds backed by years
                    of research. Based in Nashik, Maharashtra, we are committed to innovation, farmer success, and
                    sustainable agriculture. Our seeds are developed for higher yields, adaptability, and resilience,
                    ensuring better productivity for farmers across India.</p>
                <a href="#">Know More</a>
            </div>
            <div class="rght-img"><img src="{{ asset('frontend_assets/images/trusted-sec.png')}}"></div>
        </div>
    </div>
</section>
<!-- Best selling seeds -->
<section class=" best-selling-seeds">
    <div class="container">

        <div class="row">
            <div class="title-red-center">
                <h2>Discover Our Best-Selling Seeds</h2>
            </div>
            @if(count($productData) > 0)
            @foreach ($productData as $value)
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                <div class="product-list">
                    <div class="img-section">
                        <a href="{{ route('product-details', $value->product_slug) }}">
                            <img src=" {{ asset('product-images') . '/' . $value->image }}"> </a>
                    </div>
                    <div class="title">
                        <a href="{{ route('product-details', $value->product_slug) }}">
                            <h3>{{ $value->product_name}}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class=" col-lg-12 col-md-12 col-sm-12">
                <a href="{{ route('product-category')  }}" class=" view-btn">View More</a>
            </div>
            @else
            <div class="col-lg-12 col-md-12 col-sm-12">
                No Products Available
            </div>
            @endif

        </div>

    </div>
</section>

<!-- Our Founder -->
<section class="our-founder">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="maindiv">
                    <div class="left">
                        <div class="title-red-left">
                            <h2>Our Founder</h2>
                        </div>
                        <p><strong>Jagadish Hyalij – A Legacy
                                Rooted in Agriculture, A Future Sown for
                                Farmers</strong></p>
                        <p>With over 30 years of experience in
                            agriculture, Jagadish Hyalij has dedicated
                            his life to understanding the needs of
                            farmers and the ever-evolving challenges of
                            farming. His deep-rooted passion for
                            agriculture led to the foundation of Radha
                            Seeds, a company committed to providing
                            high-quality, research-driven seeds that
                            empower farmers to achieve better yields,
                            improved resilience, and long-term
                            prosperity. </p>
                        <p>For the past five years, he has focused on
                            seed innovation, ensuring that every farmer
                            has access to scientifically developed,
                            high-performing seeds tailored to diverse
                            climates and soil conditions. His vision is
                            not just to sell seeds but to sow hope,
                            nurture dreams, and cultivate success for
                            farmers across India. </p>
                        <p>At Radha Seeds, we stand by the belief that
                            every seed holds the potential to transform
                            a farmer’s life. With unwavering dedication
                            and a farmer-first approach, Jagadish Hyalij
                            continues to lead the way, ensuring that
                            agriculture remains sustainable, profitable,
                            and rewarding for generations to come </p>
                    </div>
                    <div class="right">
                        <img src="{{ asset('frontend_assets/images/our-founder.jpg')}}" alt>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Insights and Innovations Section -->
<section class=" insights-innovations">
    <div class="container">
        <!-- Title Centered -->
        <div class="title-red-center">
            <h2>Insights & Innovations</h2>
        </div>

        <!-- Row with Bootstrap Columns -->
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="maindiv">
                    <div class="ins-img-div">
                        <img src="{{ asset('blogs-images/image_thumb') . '/' . $blog->image_thumb }}" alt="Innovation 1"
                            class="img-fluid">
                    </div>
                    <div class="textdiv">
                        <p>{{Str::limit($blog->name, 80)}}</p>
                        <a href="{{ route('blog-details', $blog->slug) }}">READ MORE</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection