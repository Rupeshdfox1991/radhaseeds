@extends('frontend.layout.app')
@section('title', 'Product Details')
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>{{ $productDetails->product_name}}</h3>
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
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <div class="detail-img"><img src="{{ asset('product-images') . '/' . $productDetails->image }}"></div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                <div class="detail-content">
                    <h3>{{ $productDetails->product_name}}</h3>
                    <p>{!!$productDetails->product_desc !!}</p>
                    <a href="{{ route('contact-us')}}" class="addproduct">Enquire Now</a>
                </div>
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