@extends('frontend.layout.app')
@section('title', 'Product Category')
@section('content')



<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>Products</h3>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-cat">
    <div class="container">
        <div class="row">
            @foreach ($productCategory as $value)
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                <div class="product-list">
                    <div class="img-section">
                        <a href="{{ route('product-listing', $value->slug) }}">
                            <img src="{{ asset('ProductCategorys') . '/' . $value->image }}">
                        </a>
                    </div>
                    <div class="title">
                        <a href="{{ route('product-listing', $value->slug) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection