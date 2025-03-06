@extends('frontend.layout.app')
@section('title', $blog->name)
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>{{ $blog->name }}</h3>
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
            <div class="col-lg-7 col-md-12 col-sm-12 col-xl-7">
                <div class="detail-content">
                    <img src="{{ asset('blogs-images/image_thumb') . '/' . $blog->image_thumb }}" alt="">
                    <div class="title-date">
                        <h1>{{ $blog->name }}</h1>
                        <p><i class="fa-solid fa-calendar"></i>{{$blog->created_at->format('M d, Y')}}</p>
                    </div>
                    {!! $blog->description !!}
                </div>
            </div>


            <div class="col-lg-5 col-md-12 col-sm-12 col-xl-5">
                <div class="popular-post">
                    <h3>Popular Posts</h3>
                    @if(count($popularPosts) > 0)
                    @foreach ($popularPosts as $post)
                    <div class="post-section">
                        <img src="{{ asset('blogs-images/image_thumb') . '/' . $post->image_thumb }}" alt="">
                        <h4><a href="{{ route('blog-details', $post->slug) }}">{{ $post->name }}</a></h4>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>


        </div>
    </div>
</section>
@endsection