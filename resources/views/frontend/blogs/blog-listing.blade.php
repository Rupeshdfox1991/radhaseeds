@extends('frontend.layout.app')
@section('title', 'Blogs')
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>Blog Listing</h3>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Blog Listing</li>
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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="maindiv">
                    <div class="ins-img-div">
                        <img src="{{ asset('blogs-images/image_thumb') . '/' . $blog->image_thumb }}" alt="Innovation 1"
                            class="img-fluid">
                    </div>
                    <div class="textdiv">
                        <p>{{Str::limit($blog->name, 80)}}</p>
                        <a href="{{ route('blog-details', $blog->slug) }}">READ MORE</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection