@extends('frontend.layout.app')
@section('title', 'Product Listing')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/gallery-breadcrumb-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Mix Micronutrient</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('product-category') }}">Products</a></li>
                        <li>{{ $productCategoryName }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-cat">
    <div class="container">
        <div class="row">
            @foreach ($products as $value)
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="product-cat-list">
                    <div class="img-sec"><a href="{{ route('product-details', $value->product_slug) }}"><img
                                src="{{ asset('product-images') . '/' . $value->image }}"></a>
                    </div>
                    <a href="{{ route('product-details', $value->product_slug) }}">{{ $value->product_name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection