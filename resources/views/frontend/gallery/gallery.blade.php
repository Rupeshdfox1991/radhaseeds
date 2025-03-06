@extends('frontend.layout.app')
@section('title', 'Gallery')
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>Gallery</h3>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cat-listing">
    <div class="container">
        <div class="row">
            @foreach ($imageCategory as $value)
            <div class="col-6 col-md-4 col-lg-4 col-xl-4">
                <div class="cat-box">
                    <a href="{{ route('gallery-details', $value->slug) }}">
                        <img src="{{ asset('imagecategory') . '/' . $value->image}}" alt="">
                        <h3>{{ $value->name}}</h3>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection