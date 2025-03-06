@extends('frontend.layout.app')
@section('title', 'About-us')
@section('content')
<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>About Us</h3>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-first ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12  col-sm-12  col-xl-12 ">
                <div class="four-box-content">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="count black">5</div>
                            <span>Years of Expertise</span>
                        </div>
                        <div class="box">
                            <div class="count black">10</div>
                            <span>Crop Seeds </span>
                        </div>
                        <div class="box">
                            <div class="count black">150</div>
                            <span>Farmers</span>
                        </div>
                        <div class="box">
                            <div class="count black">5</div>
                            <span>States</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About us Section second -->
<section class="about-us-sec-second">
    <div class="title-red-center">
        <h2>About Us</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6  col-xl-6 align-self-center">
                <div class="ab-img">
                    <img src="{{ asset('frontend_assets/images/abt-img.jpg')}}" alt="">

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-xl-6 align-self-center">
                <div class="textsec">
                    <p><strong>Radha Seeds – Cultivating Excellence, Harvesting Trust</strong></p>
                    <p>Radha Seeds – Sowing Quality, Harvesting Prosperity</p>
                    <p>At <strong>Radha Seeds</strong> , we are more than just a seed company—we are a commitment to
                        agricultural excellence. Based in <strong> Nashik, Maharashtra</strong>, we have spent the last
                        five years dedicated to researching and developing <strong> high-quality seeds</strong> that
                        help farmers achieve <strong> higher yields, improved resilience, and better
                            profitability.</strong></p>
                    <p>With a strong foundation in agricultural science, we provide a <strong>diverse range of vegetable
                            and crop seeds</strong> , carefully developed to meet the evolving needs of modern farming.
                        Our seeds are bred for <strong> strong adaptability, disease resistance, and maximum
                            productivity</strong>, ensuring that farmers can cultivate success in every season.</p>
                    <p>Our mission is deeply rooted in <strong> innovation, sustainability, and farmer
                            empowerment</strong>. By combining advanced seed technology with extensive field research,
                        we equip farmers with the tools they need to grow more with confidence and efficiency.</p>
                    <p>At Radha Seeds, we believe in nurturing agriculture, enriching lives, and securing the future of
                        farming—one seed at a time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision and mission section -->
<section class="vision-mission-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12  col-xl-12 align-self-center">
                <div class="vision-mission">
                    <div class="vm-content-bg1">
                        <div class="icon-pane">
                            <img src="{{ asset('frontend_assets//images/mission-1.png')}}">
                        </div>
                        <h3>Mission</h3>
                        <p>To provide <strong> scientifically researched, high-performance, and sustainable seed
                                solutions </strong> that <strong> enhance productivity, improve soil health, and empower
                                farmers </strong> with better yields. We are committed to bridging the gap between
                            <strong> innovation and agriculture</strong>, ensuring that every farmer has access to the
                            best seeds for a prosperous future.
                        </p>
                    </div>
                    <div class="vm-content-bg2">
                        <div class="icon-pane">
                            <img src="{{ asset('frontend_assets//images/vision-1.png')}}">
                        </div>
                        <h3>Vision</h3>
                        <p>To become a <strong> trusted leader in the seed industry</strong>, revolutionizing
                            agriculture through <strong> innovation, quality, and sustainability</strong>. We envision a
                            future where <strong> every farmer thrives with resilient, high-yielding seeds</strong>,
                            contributing to a <strong> healthier and more food-secure world.</strong> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.count');
    counters.forEach(counter => {
        const target = +counter.textContent;
        counter.textContent = "0";

        const updateCount = () => {
            const current = +counter.textContent;
            const increment = target / 400;

            if (current < target) {
                counter.textContent = Math.ceil(current + increment);
                setTimeout(updateCount, 50);
            } else {
                counter.textContent = target;
            }
        };

        updateCount();
    });
});
</script>
@endpush
@endsection