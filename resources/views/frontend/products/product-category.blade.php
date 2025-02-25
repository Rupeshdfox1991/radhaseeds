@extends('frontend.layout.app')
@section('title', 'Product Category')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/gallery-breadcrumb-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Products</h2>
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
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="product-cat-list">
                    <div class="img-sec"><a href="{{ route('product-listing', $value->slug) }}">
                            <img src="{{ asset('ProductCategorys') . '/' . $value->image }}">
                        </a>
                    </div>
                    <a href="{{ route('product-listing', $value->slug) }}">{{ $value->name }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection