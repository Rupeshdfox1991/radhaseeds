@extends('frontend.layout.app')
@section('title', 'blog')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/careers-breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Blogs</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('blogs') }}">Blogs</a></li>
                        <li>{{ $blog->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xl-8 offset-xl-2">
                <div class="detail-img-pain"><img src="{{ asset('frontend_assets/images/blog-details.jpg') }}"></div>
                <h2>{{ $blog->name }}</h2>
                <div class="date"><i class="fa fa-calendar"
                        aria-hidden="true"></i>{{$blog->created_at->format('d M. Y')}}</div>
                <p>{!! $blog->description !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection