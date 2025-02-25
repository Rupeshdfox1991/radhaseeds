@extends('frontend.layout.app')
@section('title', 'Gallery Details')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/gallery-breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Open face creepeth</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li>{{ $imagecategoryName }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gd-pane">
    <div class="container">
        <div class="row">
            @foreach ($imageGallery as $value)
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="gallery_product">
                    <div class="img-section">
                        <div class="content-overlay"></div>
                        <img class="content-image" src="{{ asset('gallery-images') . '/' . $value->images }}">
                        <div class="content-details fadeIn-top">
                            <a class="example-image-link" href="{{ asset('gallery-images') . '/' . $value->images }}"
                                data-lightbox="example-set"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection