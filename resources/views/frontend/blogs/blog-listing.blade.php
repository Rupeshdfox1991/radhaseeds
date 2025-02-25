@extends('frontend.layout.app')
@section('title', 'Blogs')
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
                        <li>Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-listing">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                <div class="blog-pane">
                    <div class="img-section"><img src="{{ asset('blogs-images') . '/' . $blog->image }}"></div>
                    <div class="info-sec">
                        <div class="date">{{$blog->created_at->format('M. d Y')}}</div>
                        <h3>{{Str::limit($blog->name, 28)}}</h3>
                        <p>{!!Str::limit($blog->description, 250) !!}</p>
                        <a href="{{ route('blog-details', $blog->slug) }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection