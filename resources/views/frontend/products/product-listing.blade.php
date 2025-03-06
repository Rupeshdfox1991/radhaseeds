@extends('frontend.layout.app')
@section('title', 'Product Listing')
@section('content')

    <section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <h3>{{ $productCategoryName }}</h3>
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
                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <div class="product-list">
                            <div class="img-section">
                                <a href="{{ route('product-details', $value->product_slug) }}">
                                    <img src="{{ asset('product-images') . '/' . $value->image }}">
                                </a>
                            </div>
                            <div class="title">
                                <a href="{{ route('product-details', $value->product_slug) }}">
                                    <h3>{{ $value->product_name}}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection