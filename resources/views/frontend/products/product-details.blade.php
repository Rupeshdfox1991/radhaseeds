@extends('frontend.layout.app')
@section('title', 'Product Details')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/gallery-breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>{{ $productDetails->product_name}}</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('product-category') }}">Products</a></li>
                        <li><a
                                href="{{ route('product-listing', $productDetails->categoriesData->slug) }}">{{ $productDetails->categoriesData->name }}</a>
                        </li>
                        <li>{{ $productDetails->product_name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xl-5">
                <div class="img-section"><img src="{{ asset('product-images') . '/' . $productDetails->image }}"></div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xl-7">
                <div class="content-sec">
                    <h2>{{ $productDetails->product_name}}</h2>
                    <p>{!!$productDetails->product_desc !!}</p>
                    <p>
                        <strong>SKU:</strong> {{ $productDetails->product_code}}
                    </p>
                    <div class="size">
                        <h4>Available in Size</h4>
                        <ul>
                            <li>1 Ltr.</li>
                            <li>1.5 Ltr.</li>
                            <li>2 Ltr.</li>
                            <li>2.5 Ltr.</li>
                        </ul>
                    </div>
                    <a class="btn-form-submit btn addproduct" href="{{ route('contact-us')}}">Request A Quote!</a>
                </div>
            </div>
        </div>
</section>

@push('scripts')
<script>
$(document).ready(function() {
    let product = <?= json_encode($productDetails->product_name); ?>;

    $('.addproduct').click(function() {
        localStorage.setItem('product_name', product);
    });

});
</script>
@endpush
@endsection